# Laravel 9 Razorpay 具象狀態傳輸應用程式介面用戶端

引入 razorpay 的 razorpay 套件來擴增 RazorPay 付款服務，可處理多種付款模式，例如信用卡、簽帳金融卡、UPI 以及特定行動錢包，協助順利拓展線上業務。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/razorpay/payment/` 來進行  RazorPay 付款服務。

----

## 畫面截圖
![](https://i.imgur.com/6u25h0S.gif)
> 可以透過信用卡、金融卡、網絡銀行和電子錢包來進行線上收款
