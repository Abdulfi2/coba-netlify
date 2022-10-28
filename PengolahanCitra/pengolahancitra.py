import cv2

citra = cv2.imread("C:/xampp/htdocs/PengolahanCitra/DNA.jpg")

cv2.imshow("DNA-Blue", citra[:,:,0])
cv2.imshow("DNA-Green", citra[:,:,1])
cv2.imshow("DNA-Red", citra[:,:,2])

print(citra)

cv2.waitKey()