# coding:utf-8
import tkinter
import all_input

# 画面作成
tk = tkinter.Tk()
tk.geometry('350x50') # 画面サイズの設定
tk.title('自動出品投稿ツール') # 画面タイトルの設定

# 自動投稿処理
def all_input_kizi_event():
    u_data1 = u_data1_box.get()
    u_data2 = u_data2_box.get()
    all_input.all_input_data(u_data1,u_data2)
    
u_data_label = tkinter.Label(text='指定データ：')
u_data_label.place(x=30, y=20)

u_data1_box = tkinter.Entry(width=7)
u_data1_box.insert(0, '1')
u_data1_box.place(x=100, y=20)

u_data_label = tkinter.Label(text='から')
u_data_label.place(x=150, y=20)

u_data2_box = tkinter.Entry(width=7)
u_data2_box.insert(0, '5')
u_data2_box.place(x=180, y=20)

button = tkinter.Button(text="投稿開始",command=all_input_kizi_event)
button.place(x=240, y=15)

# 画面をそのまま表示
tk.mainloop()