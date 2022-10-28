# Tugas Kelompok Pengolahan Citra
# Abdul Fattah Ismail, Muhammad Ficri Hanip, M Shayid Vedawynne


import cv2 as cv
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt

# membaca img digital dari komputer
img = cv.imread("C:/xampp/htdocs/PengolahanCitra/house-color.jpg")

# b,g,r =cv.split(img)
img_gray = cv.cvtColor(img, cv.COLOR_RGB2GRAY)
cv.imshow("img", img)
cv.imshow("DNA - Gray", img_gray)
# cv.imshow("b", b)
# cv.imshow("g", g)
# cv.imshow("r", r)

# sns.countplot(x='pclass', data='img')
plt.hist(img.ravel(), 256, [0, 256])
plt.show()

cv.waitKey()