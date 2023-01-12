# koko-campus.org

プログラミング初めて一番最初に作ったサイト。  
[気づけばプロ並みPHP 改訂版](https://www.ric.co.jp/book/programming/detail/192)を見て、頑張って作ったサイト。  

せっかくだから、3年近くたって技術力がついた今、Docker上で動作させようと改修してみた。  
初心者のかわいらしいコードがたくさんあるので、初心に戻りたい際に戻ってきます。  

このころはGitも使っていなかったし、ハードコーディングだし、セキュリティはガバガバで、ユーザビリティを損なうUIデザインだったりと、お楽しみコードがたくさんあります。  
ってかデータベースも結局値段が高くて諦めたんだった笑  

## 実行方法

```shell
docker build -t koko-campus-org . && docker run -p 80:80 -it --rm --name my-koko-campus-org koko-campus-org
```
