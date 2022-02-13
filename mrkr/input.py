# 自動投稿処理
def input_data(i):
    import webbrowser
    import time
    import os
    import pyperclip
    import pyautogui
    import csv

    files = []

    kizi_sleeo_time = 3

    little_sleeo_time = 5

    sleeo_time = 8

    sleeo_wait = 8

    content_dir_path = os.getcwd() + chr(92) + "data_"+str(i) + chr(92)
    data_dir_path = os.getcwd() + chr(92) + "data_"+str(i) + chr(92)
    img_dir_path = os.getcwd() + chr(92) + "data_"+str(i) + chr(92) + "img" + chr(92) 

    # ブラウザを開く。
    driver = webbrowser.open('https://www.mercari.com/jp/sell')

    time.sleep(sleeo_time)

    for x in os.listdir(img_dir_path):
        if os.path.isfile(img_dir_path + x):
            files.append(x)

    time.sleep(sleeo_time)

    pyautogui.press('tab')
    pyautogui.press('tab')

    for img_count in range(len(files)):
        
        pyautogui.press('enter')

        pyperclip.copy(img_dir_path + files[img_count])

        time.sleep(sleeo_time)

        print(img_count)

        pyautogui.hotkey('ctrl', 'v')

        time.sleep(sleeo_time)

        pyautogui.press('enter')

        time.sleep(sleeo_time)

    with open(data_dir_path+'data.csv', 'r') as file:
            reader = csv.reader(file)
            for row in reader:

                pyautogui.press('tab')

                pyperclip.copy(row[4])

                time.sleep(little_sleeo_time)

                pyautogui.hotkey('ctrl', 'v')

                pyautogui.press('tab')

                # 商品説明

                with open(content_dir_path+'content.csv', 'r') as f_content:
                    c_reader = csv.reader(f_content)
                    for c_row in c_reader:

                        time.sleep(kizi_sleeo_time)

                        if c_row == [] :
                            pyautogui.press('enter')
                        else:
                            pyperclip.copy(str(c_row[0]))

                            pyautogui.hotkey('ctrl', 'v')

                            pyautogui.press('enter')
                
                pyautogui.press('tab')
                time.sleep(little_sleeo_time)

                for category_1 in range(int(row[0])):
                    pyautogui.press('down')

                time.sleep(little_sleeo_time)
                
                pyautogui.press('tab')

                for category_2 in range(int(row[1])):
                    pyautogui.press('down')

                time.sleep(little_sleeo_time)

                if int(row[2]) != 0:
                    pyautogui.press('tab')
                    for category_3 in range(int(row[2])):
                        pyautogui.press('down')
                
                time.sleep(little_sleeo_time)

                if int(row[3]) != 0:
                    pyautogui.press('tab')
                    for category_4 in range(int(row[3])):
                        pyautogui.press('down')
                
                time.sleep(little_sleeo_time)

                pyautogui.press('tab')
                pyautogui.press('tab')

                time.sleep(little_sleeo_time)
                pyautogui.press('down')

                pyautogui.press('tab')
                pyautogui.press('tab')

                time.sleep(little_sleeo_time)
                pyautogui.press('down')

                pyautogui.press('tab')

                time.sleep(little_sleeo_time)
                pyautogui.press('down')
                pyautogui.press('down')

                time.sleep(little_sleeo_time)

                pyautogui.press('tab')

                for count_from in range(33):
                    pyautogui.press('down')
                
                pyautogui.press('tab')
                
                time.sleep(little_sleeo_time)
                pyautogui.press('down')

                pyautogui.press('tab')
                pyautogui.press('tab')

                pyperclip.copy(row[5])

                pyautogui.hotkey('ctrl', 'v')

                pyautogui.press('tab')
                pyautogui.press('tab')

                pyautogui.press('enter')

                time.sleep(little_sleeo_time)

                pyautogui.hotkey('ctrl', 'w')


    print("\n★★★" + str(i)+ "つ目：出品下書き投稿完了★★★")