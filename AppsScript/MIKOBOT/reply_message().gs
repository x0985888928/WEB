// 這是對於機器人回覆的程式碼
function reply_message(replyToken,reply,url='https://api.line.me/v2/bot/message/reply'){
  UrlFetchApp.fetch(url, {
      'headers': { //JavaScript的headers
        'Content-Type': 'application/json; charset=UTF-8',
        'Authorization': 'Bearer ' + CHANNEL_ACCESS_TOKEN, //帶入LINE BOT的channel_access_token
      },
      'method': 'post', //使用POST的方式回傳
      'payload': JSON.stringify({ //將訊息轉為JSON格式，JavaScript常用JSON傳輸資料
        'replyToken': replyToken,  //每個reply事件專屬的replyToken
        'messages': [{'type': 'text','text':reply}] //回傳文字訊息，內容為reply也就是userMessage
        }),
    });
} 