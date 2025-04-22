//認證身份 channel_access_token
var CHANNEL_ACCESS_TOKEN='mask'

//主程式跑的地方(main)
function doPost(e)  {  //當網頁有Post請求時就會依據網址來執行這doPost
  var msg= JSON.parse(e.postData.contents); //將事件(e)內的文字訊息解析出來
  var replyToken = msg.events[0].replyToken; //replyToken是每個能夠reply的事件一定會附屬的令牌
  var userMessage = msg.events[0].message.text; //解析使用者傳出的訊息內容
  var userid=msg.events[0].source.userId; //專屬於你的User ID
  var reply = "" 
  if(userMessage.includes("匯率"))
  {
    var rateJP = getExchangeRate("JPY")
    var rateUSD = getExchangeRate("USD")
    var rateGOLD = getGold()

    reply +=`日圓匯率: ${rateJP}`
    if (rateJP < 0.22 || rateJP > 0.25) {reply +="，可以買進/賣出囉\n"}
    else {reply += "，不用買賣\n"}
    
    reply +=`美圓匯率: ${rateUSD}`
    if (rateUSD < 31.75 || rateUSD > 32.5) {reply +="，可以買進/賣出囉\n"}
    else {reply += "，不用買賣\n"}

    reply +=`黃金匯率: ${rateGOLD}`
    reply_message(replyToken,reply); 
  }
  else if(userMessage.includes("天氣"))
  {
    reply = getWeather();
    reply_message(replyToken,reply); 
  }
  else
  {
    reply_message(replyToken,"喵哈囉~"); 
  }
}

