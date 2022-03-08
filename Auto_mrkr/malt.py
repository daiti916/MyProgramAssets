# -*- coding:utf-8 -*-
import tkinter
import threading
import datetime

start_flag = False
quitting_flag = False
status = ""

dict_end_date = {"年": 2022, "月": 4, "日": 5, "時": 9}

dt_now = datetime.datetime.now()
end_date = datetime.datetime(dict_end_date["年"], dict_end_date["月"], dict_end_date["日"])

# メインウィンドウを作成
app = tkinter.Tk()
app.geometry("400x230+1300+250")
app.title('メルカリ：自動出品投稿ツール') # 画面タイトルの設定

# タイマー
def input_event():
    global label
    global start_flag
    global quitting_flag
    global status

    while not quitting_flag:
        if start_flag:
            import webbrowser
            import time
            import schedule
            import pyperclip
            import pyautogui
            import configparser
            import os
            import errno

            disp_status = True

            if disp_status:

                job1_time = time1_data_box.get()+str(":00")
                job2_time = time2_data_box.get()+str(":00")
                job3_time = time3_data_box.get()+str(":00")
                job4_time = time4_data_box.get()+str(":00")
                job5_time = time5_data_box.get()+str(":00")
                cnt1_data = cnt1_data_box.get()
                cnt2_data = cnt2_data_box.get()
                cnt3_data = cnt3_data_box.get()
                cnt4_data = cnt4_data_box.get()
                cnt5_data = cnt5_data_box.get()

                # ----  設定情報表示(1回だけ) ----- #
                print("-------------投稿設定内容--------------")
                print("設定1：時間：　" + str(job1_time))
                print("設定1：回数：　" + str(cnt1_data) + "回")

                print("設定2：時間：　" + str(job2_time))
                print("設定2：回数：　" + str(cnt2_data) + "回")

                print("設定3：時間：　" + str(job3_time))
                print("設定3：回数：　" + str(cnt3_data) + "回")

                print("設定4：時間：　" + str(job4_time))
                print("設定4：回数：　" + str(cnt4_data) + "回")

                print("設定5：時間：　" + str(job5_time))
                print("設定5：回数：　" + str(cnt5_data) + "回")
                print("---------------------------------------")

                # --------------------------------------------------
                # configparserの宣言とiniファイルの読み込み
                # --------------------------------------------------
                config_ini = configparser.ConfigParser()
                config_ini_path = 'config/config.ini'
               # 指定したiniファイルが存在しない場合、エラー発生
                if not os.path.exists(config_ini_path):
                    raise FileNotFoundError(errno.ENOENT, os.strerror(errno.ENOENT), config_ini_path)

                config_ini.read(config_ini_path, encoding='sjis')
                disp_status = False

            def job(cnt_num,set):
                # 下書き存在有無座標
                draft_check_x = int(config_ini['DEFAULT']['draft_check_x'])
                draft_check_y = int(config_ini['DEFAULT']['draft_check_y'])

                # 下書き一番上のデータ座標
                draft_up_x = int(config_ini['DEFAULT']['draft_up_x'])
                draft_up_y = int(config_ini['DEFAULT']['draft_up_y'])
                
                
                page_load_time = int(config_ini['DEFAULT']['page_load_time'])
                action_wait = int(config_ini['DEFAULT']['action_wait'])

                for cnt in(range(int(cnt_num))):
                    print(str(set) + " : " + str(cnt_num) + "回投稿中 : " +str(int(cnt) + 1) + "回目投稿開始")
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

                        end_status = 1

                        # ページを閉じる
                        pyautogui.hotkey('ctrl', 'w')

                        time.sleep(action_wait)
                        break
                    if end_status == 1:
                        break
    
                print("⇒　出品作業終了")
                print("---------------------------------------")
        
            # ----- 5スケジュール設定 -----
            schedule.every().day.at(job1_time).do(job,cnt1_data,"設定1")
            schedule.every().day.at(job2_time).do(job,cnt2_data,"設定2")
            schedule.every().day.at(job3_time).do(job,cnt3_data,"設定3")
            schedule.every().day.at(job4_time).do(job,cnt4_data,"設定4")
            schedule.every().day.at(job5_time).do(job,cnt5_data,"設定5")
    
            # 稼働中：フル稼働
            while start_flag:
                schedule.run_pending()

# マウスポジション取得処理
def get_mouse_event():
    import pyautogui 
    import time

    time.sleep(10)
    print(pyautogui.position())
    print("⇒　座標取得完了")
    print("---------------------------------------")
    status = "停止中"
    label.config(text=status)

# スタートボタンが押された時の処理
def start_button_click(event):
    global start_flag
    global status
    status = "稼働中"
    start_flag = True
    label.config(text=status)

# ストップボタンが押された時の処理
def stop_button_click(event):
    global start_flag
    global status
    status = "停止中"
    print("稼働停止")
    print("---------------------------------------")
    start_flag = False
    label.config(text=status)

# マウスボタンが押された時の処理
def mouse_button_click(event):
    global start_flag
    global status
    status = "座標取得中"
    print("座標取得中")
    print("---------------------------------------")
    start_flag = False
    label.config(text=status)

# 終了ボタンが押された時の処理
def quit_app():
    global quitting_flag
    global app
    global thread1

    quitting_flag = True

    # thread1終了まで待つ
    thread1.join()

    # thread1終了後にアプリ終了
    app.destroy()


if end_date < dt_now:
    # 試用期限
    lbl = tkinter.Label(
        text="ソフトの使用期限が終了しています",
        font=("MSゴシック", "10", "bold"),
        bg="#FF97C2"
    )

    lbl.place(x=75, y=90)
else:
    # ----- 出品時間 ----- #
    # 出品1時間
    time1_label = tkinter.Label(text='時間1：')
    time1_label.place(x=30, y=20)

    time1_data_box = tkinter.Entry(width=7)
    time1_data_box.insert(0, '11:20')
    time1_data_box.place(x=80, y=20)

    # 出品2時間
    time2_label = tkinter.Label(text='時間2：')
    time2_label.place(x=30, y=60)

    time2_data_box = tkinter.Entry(width=7)
    time2_data_box.insert(0, '12:30')
    time2_data_box.place(x=80, y=60)

    # 出品3時間
    time3_label = tkinter.Label(text='時間3：')
    time3_label.place(x=30, y=100)

    time3_data_box = tkinter.Entry(width=7)
    time3_data_box.insert(0, '15:30')
    time3_data_box.place(x=80, y=100)

    # 出品4時間
    time4_label = tkinter.Label(text='時間4：')
    time4_label.place(x=30, y=140)

    time4_data_box = tkinter.Entry(width=7)
    time4_data_box.insert(0, '17:30')
    time4_data_box.place(x=80, y=140)

    # 出品5時間
    time5_label = tkinter.Label(text='時間5：')
    time5_label.place(x=30, y=180)

    time5_data_box = tkinter.Entry(width=7)
    time5_data_box.insert(0, '21:30')
    time5_data_box.place(x=80, y=180)


    # ----- 投稿回数 ----- #
    # 回数1
    cnt1_num_label = tkinter.Label(text='回数1：')
    cnt1_num_label.place(x=140, y=20)

    cnt1_data_box = tkinter.Entry(width=5)
    cnt1_data_box.insert(0, '2')
    cnt1_data_box.place(x=190, y=20)


    # 回数2
    cnt2_num_label = tkinter.Label(text='回数2：')
    cnt2_num_label.place(x=140, y=60)

    cnt2_data_box = tkinter.Entry(width=5)
    cnt2_data_box.insert(0, '2')
    cnt2_data_box.place(x=190, y=60)

    # 回数3
    cnt3_num_label = tkinter.Label(text='回数3：')
    cnt3_num_label.place(x=140, y=100)

    cnt3_data_box = tkinter.Entry(width=5)
    cnt3_data_box.insert(0, '2')
    cnt3_data_box.place(x=190, y=100)

    # 回数4
    cnt4_num_label = tkinter.Label(text='回数4：')
    cnt4_num_label.place(x=140, y=140)

    cnt4_data_box = tkinter.Entry(width=5)
    cnt4_data_box.insert(0, '2')
    cnt4_data_box.place(x=190, y=140)

    # 回数5
    cnt5_num_label = tkinter.Label(text='回数5：')
    cnt5_num_label.place(x=140, y=180)

    cnt5_data_box = tkinter.Entry(width=5)
    cnt5_data_box.insert(0, '2')
    cnt5_data_box.place(x=190, y=180)



    # ボタンの作成と配置
    start_button = tkinter.Button(
        app,
        text="投稿開始",
        font=("MSゴシック", "13", "bold"),
        bg="#FFCC99"
    )
    start_button.place(x=280,y=70,width=85,height=30)

    stop_button = tkinter.Button(
        app,
        text="ストップ",
        font=("MSゴシック", "13", "bold"),
        bg="#CCFFFF"
    )
    stop_button.place(x=280,y=120,width=85,height=30)

    # マウスポジション取得ボタン
    mouse_button = tkinter.Button(
        text="座標取得",
        font=("MSゴシック", "12", "bold"),
        bg="#FFFF99",
        command=get_mouse_event
    )
    mouse_button.place(x=280, y=170)

    # ラベルの作成と配置
    label = tkinter.Label(
        app,
        width=10,
        text="停止中",
        font=("", 20)
    )
    label.place(x=250, y=20)

    # イベント処理の設定
    start_button.bind("<ButtonPress>", start_button_click)
    stop_button.bind("<ButtonPress>", stop_button_click)
    mouse_button.bind("<ButtonPress>", mouse_button_click)
    app.protocol("WM_DELETE_WINDOW", quit_app)

    #　スレッドの生成と開始
    thread1 = threading.Thread(target=input_event)
    thread1.start()

# メインループ
app.mainloop()