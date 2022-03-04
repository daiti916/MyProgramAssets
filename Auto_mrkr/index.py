# coding:utf-8
import tkinter
import datetime
from lib import input
from lib import mouse


# 画面作成
tk = tkinter.Tk()
tk.geometry("270x300+1300+250") # 画面サイズの設定
tk.title('自動出品投稿ツール') # 画面タイトルの設定

dict_end_date = {"年": 2022, "月": 4, "日": 5, "時": 9}

dt_now = datetime.datetime.now()
end_date = datetime.datetime(dict_end_date["年"], dict_end_date["月"], dict_end_date["日"])

if end_date < dt_now:
    # 試用期限
    lbl = tkinter.Label(text="ソフトの使用期限が終了しています。")
    lbl.place(x=60, y=15)
else:

    # 自動投稿処理
    def input_kizi_event():
        time1_data = time1_data_box.get()
        time2_data = time2_data_box.get()
        time3_data = time3_data_box.get()
        time4_data = time4_data_box.get()
        time5_data = time5_data_box.get()
        cnt1_data = cnt1_data_box.get()
        cnt2_data = cnt2_data_box.get()
        cnt3_data = cnt3_data_box.get()
        cnt4_data = cnt4_data_box.get()
        cnt5_data = cnt5_data_box.get()
        input.input_data(time1_data,time2_data,time3_data,time4_data,time5_data,
                         cnt1_data,cnt2_data,cnt3_data,cnt4_data,cnt5_data)

    # マウスポジション取得処理
    def get_mouse_event():
        mouse.mouse_position()


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

    # 自動投稿ボタン
    button = tkinter.Button(text="投稿開始",command=input_kizi_event)
    button.place(x=30, y=230)

    # マウスポジション取得ボタン
    mouse_button = tkinter.Button(text="ポジション取得",command=get_mouse_event)
    mouse_button.place(x=150, y=230)

tk.mainloop()