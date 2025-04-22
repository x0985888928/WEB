function getExchangeRate(type) {
  // 發送請求以獲取匯率資訊
  const url = `https://api.exchangerate-api.com/v4/latest/${type}`;
  const response = UrlFetchApp.fetch(url);
  const data = JSON.parse(response.getContentText());
  
  // 提取所需的匯率資訊
  const all_exchangeRate = data.rates;
  const exchangeRate = all_exchangeRate["TWD"];
  return exchangeRate;
}

function getGold(){
  // 發送請求以獲取匯率資訊
  const url = "https://www.tpex.org.tw/openapi/v1/tpex_gold_latest";
  const response = UrlFetchApp.fetch(url);
  const data = JSON.parse(response.getContentText());
  
  // 提取所需的匯率資訊
  const exchangeRate = data[0];
  const exchangeRateLP = exchangeRate['TradingLatestTradingInfo.LatestPrice'];
  return exchangeRateLP;

}