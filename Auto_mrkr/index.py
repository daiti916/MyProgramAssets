# coding:utf-8
import tkinter
import datetime
import input

# 画面作成
tk = tkinter.Tk()
tk.geometry('300x50') # 画面サイズの設定
tk.title('自動出品投稿ツール') # 画面タイトルの設定

dict_end_date = {"年": 2022, "月": 4, "日": 5, "時": 9}

dt_now = datetime.datetime.now()
end_date = datetime.datetime(dict_end_date["年"], dict_end_date["月"], dict_end_date["日"])

if end_date < dt_now:
    # 試用期限
    lbl = tkinter.Label(text="ソフトの使用期限が終了しています。")
    lbl.place(x=60, y=15)
else:

    def input_kizi_event():
        time_data = time_data_box.get()
        cnt_data = cnt_data_box.get()
        input.input_data(time_data,cnt_data)


    time_label = tkinter.Label(text='時間：')
    time_label.place(x=30, y=20)

    time_data_box = tkinter.Entry(width=5)
    time_data_box.insert(0, '11')
    time_data_box.place(x=70, y=20)

    cnt_num_label = tkinter.Label(text='回数：')
    cnt_num_label.place(x=120, y=20)

    cnt_data_box = tkinter.Entry(width=5)
    cnt_data_box.insert(0, '2')
    cnt_data_box.place(x=160, y=20)

    button = tkinter.Button(text="投稿開始",command=input_kizi_event)
    button.place(x=210, y=15)

tk.mainloop()