import cv2
import numpy as np
import time


time.sleep(1)

img = cv2.imread("2006-03\\0.jpg")
img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)


for i in range(50):
    img1 = img[0 : 570, 20 + i : 600 + i]
    img2 = img[0 : 570, 600 : 1180]


    img3 = img2 - img1

    cv2.imshow("サイゼリヤ♪", img3)
    cv2.waitKey(200)
    
cv2.destroyAllWindows()





