# coding:utf-8
import tkinter
import input

# 画面作成
tk = tkinter.Tk()
tk.geometry('300x50') # 画面サイズの設定
tk.title('自動出品投稿ツール') # 画面タイトルの設定

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


"""
# 自動投稿処理
def all_input_kizi_event():
    u_data1 = u_data1_box.get()
    u_data2 = u_data2_box.get()
    all_input.all_input_data(u_data1,u_data2)
    
u_data_label = tkinter.Label(text='指定データ：')
u_data_label.place(x=30, y=120)

u_data1_box = tkinter.Entry(width=7)
u_data1_box.insert(0, '1')
u_data1_box.place(x=100, y=120)

u_data_label = tkinter.Label(text='から')
u_data_label.place(x=150, y=120)

u_data2_box = tkinter.Entry(width=7)
u_data2_box.insert(0, '5')
u_data2_box.place(x=180, y=120)

button = tkinter.Button(text="投稿開始",command=all_input_kizi_event)
button.place(x=240, y=140)

# 画面をそのまま表示
tk.mainloop()
"""