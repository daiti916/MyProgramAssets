def input_data(time_data,cnt_data):
    import webbrowser
    import time
    import schedule
    import pyperclip
    import pyautogui
    import configparser
    import os
    import errno

    page_load_time = 3
    action_wait = 1

    job_time = str(time_data) + ":00"

    print("設定時間：　" + str(job_time))
    print("投稿回数：　" + str(cnt_data) + "回")

    # --------------------------------------------------
    # configparserの宣言とiniファイルの読み込み
    # --------------------------------------------------
    config_ini = configparser.ConfigParser()
    config_ini_path = 'config/config.ini'
    # 指定したiniファイルが存在しない場合、エラー発生
    if not os.path.exists(config_ini_path):
        raise FileNotFoundError(errno.ENOENT, os.strerror(errno.ENOENT), config_ini_path)

    config_ini.read(config_ini_path, encoding='sjis')

    def job():
        # 下書き存在有無座標
        draft_check_x = int(config_ini['DEFAULT']['draft_check_x'])
        draft_check_y = int(config_ini['DEFAULT']['draft_check_y'])

        # 下書き一番上のデータ座標
        draft_up_x = int(config_ini['DEFAULT']['draft_up_x'])
        draft_up_y = int(config_ini['DEFAULT']['draft_up_y'])

        for cnt in(range(int(cnt_data))):
            print(str(int(cnt) + 1) + "回目投稿開始")
            # ブラウザを開く。
            driver = webbrowser.open('https://jp.mercari.com/sell/drafts')

            # ロード待ち
            time.sleep(page_load_time)

            #キャッシュクリア
            pyautogui.hotkey('ctrl', 'f5')

            # ロード待ち
            time.sleep(page_load_time)
        
            # 下書き記事の存在チェック
            pyautogui.moveTo(draft_check_x, draft_check_y)
            pyautogui.dragRel(250, 0, duration=0.5) # →
            pyautogui.hotkey('ctrl', 'c')
            clip_str = pyperclip.paste()

            # 下書き有無チェック
            if clip_str != "下書き中の商品がありません":

                time.sleep(page_load_time)

                # 下書き一番上をクリック
                pyautogui.click(draft_up_x, draft_up_y)

                time.sleep(page_load_time)

                pyautogui.hotkey('ctrl', 'f')

                time.sleep(action_wait)

                pyperclip.copy("出品する")
                pyautogui.hotkey('ctrl', 'v')

                time.sleep(action_wait)

                for tab1 in(range(3)):
                    pyautogui.press('tab')
                pyautogui.press('enter')

                time.sleep(action_wait)
            
                # 出品ボタン押下
                pyautogui.press('enter')

                print("⇒　" + str(int(cnt) + 1) + "回目投稿完了")

                time.sleep(page_load_time)

                # ページを閉じる
                pyautogui.hotkey('ctrl', 'w')

                time.sleep(action_wait)
            else:
                print("※　下書きはありません")

                time.sleep(action_wait)

                # ページを閉じる
                pyautogui.hotkey('ctrl', 'w')
                break
    
        print("⇒　出品作業終了")
        
    schedule.every().day.at(job_time).do(job)

    # フル稼働
    while True:
        schedule.run_pending()
        time.sleep(40)