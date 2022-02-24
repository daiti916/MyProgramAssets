def input_data():
    import webbrowser
    import time
    import os
    import pyperclip
    import pyautogui
    import csv

    page_load_time = 3
    action_wait = 1

    for cnt in(range(3)):
        # ブラウザを開く。
        driver = webbrowser.open('https://jp.mercari.com/sell/drafts')

        # ロード待ち
        time.sleep(page_load_time)

        
        # 下書き記事の存在チェック
        pyautogui.moveTo(356, 494)
        pyautogui.dragRel(250, 0, duration=0.5) # →
        pyautogui.hotkey('ctrl', 'c')
        clip_str = pyperclip.paste()

        # 下書き有無チェック
        if clip_str != "下書き中の商品がありません":

            time.sleep(page_load_time)

            # 下書き一番上をクリック
            pyautogui.click(426, 300)

            time.sleep(page_load_time)

            pyautogui.hotkey('ctrl', 'f')

            pyperclip.copy("出品する")
            pyautogui.hotkey('ctrl', 'v')

            for tab1 in(range(3)):
                pyautogui.press('tab')
            pyautogui.press('enter')
            
            # 出品ボタン押下
            pyautogui.press('enter')

            time.sleep(page_load_time)

            # ページを閉じる
            pyautogui.hotkey('ctrl', 'w')

            time.sleep(100)
        else:
            print("※　下書きはありません")
            break
    
    print("⇒　出品作業終了")

