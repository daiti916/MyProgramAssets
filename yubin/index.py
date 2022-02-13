from selenium import webdriver
import time
import os
import webbrowser
import pyautogui
import csv
import math
# 実行ファイルディレクリのみ取得
dir_path = os.getcwd() + chr(92) 

#待ち時間
sleeo_time = 3

inpu_time = 1

read_sleeo_time = 5

#変数定義
data_count = 0
count = 1

# ブラウザを開く。
driver = webdriver.Chrome(executable_path= dir_path + 'chome/chromedriver.exe')

url = "https://trackings.post.japanpost.jp/services/srv/search/input"
        
# Googleの検索TOP画面を開く。
driver.get(url)

# 指定時間待機
time.sleep(sleeo_time)

# データ数取得
with open(dir_path + 'data.csv') as f:
    for line in f:
        data_count += 1

with open(dir_path + 'data.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        # if int(num_count) == 1:
        #   count = 1
        #    num_count = 0

        driver.find_element_by_name("requestNo"+str(count)).send_keys(row[0])
        
        count = count +1

# 指定時間待機
time.sleep(inpu_time)

driver.find_element_by_name("search").click()

time.sleep(sleeo_time)

driver.find_element_by_xpath("//*[@id=\"content\"]/form/div/p[2]/input").click()


"""
driver.find_element_by_xpath("/html/body/div/main/div[2]/div/label[2]").click()

time.sleep(sleeo_time)

driver.find_element_by_name("user2").send_keys("09059669789001")

time.sleep(sleeo_time)

driver.find_element_by_name("pass2").send_keys("senda9789")

time.sleep(sleeo_time)

driver.find_element_by_xpath("/html/body/div/main/div[2]/div/div[2]/div/div[1]/div/dl/dd[4]/button").click()

time.sleep(read_sleeo_time)

pyautogui.click(412, 755)

count = 1

time.sleep(read_sleeo_time)
num_count = 0
data_count = 0
# データ数取得
with open(dir_path + 'data.csv') as f:
    for line in f:
        data_count += 1

with open(dir_path + 'data.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        if int(num_count) == 1:
            count = 1
            num_count = 0

        driver.find_element_by_name("main:no"+str(count)).send_keys(row[0])

        print("入力完了　⇒　" + str(row[0]))

        if data_count >= 11:
            if int(count) != 0:
                if int(count) % 10 == 0:
                    driver.find_element_by_name("main:toiStart").click()

                    time.sleep(sleeo_time)

                    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")

                    time.sleep(sleeo_time)
 
                    driver.find_element_by_name("InfoForm:btnRequestEntry").click()

                    time.sleep(sleeo_time)

                    driver.find_element_by_xpath("/html/body/table/tbody/tr[2]/td/table/tbody/tr[3]/td").click()

                    time.sleep(read_sleeo_time)

                    pyautogui.click(412, 755)

                    time.sleep(read_sleeo_time)

                    num_count = 1

                # 入力位置特定
        count = count +1

        time.sleep(inpu_time)

# データ件数：10以下
if int(count)-1 <= 10:
    driver.find_element_by_name("main:toiStart").click()

    time.sleep(read_sleeo_time)

    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")

    time.sleep(read_sleeo_time)
 
    driver.find_element_by_name("InfoForm:btnRequestEntry").click()
"""