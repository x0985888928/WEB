
function getWeather() {
  // 發送請求以獲取匯率資訊
  var query = "CWB-410C34F4-9643-4240-9F34-10BB88F7EB14";
  const url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-073?Authorization=" + query;
  const response = UrlFetchApp.fetch(url);
  const data = JSON.parse(response.getContentText());
  
  const records = data['records'];
  const locations = records['locations'][0];
  const location = locations['location'][4];
  const weatherElement = location['weatherElement'][6];
  
  var str ="";
  let i = 0;
  while (i <= 8) {
    const time = weatherElement['time'][i];
    str += time['startTime']+" ";
    str += time['elementValue'][0]['value']+"\n";
    
    i++;
  }
  const sentences = str.split('。');
  str = "";
  let k = 0;
  while(k < sentences.length)
  {
    str+= sentences[k]+"; ";
    if((k-3)%6==0)
    {
      k=k+2;
      str += "\n";
    }
    k+=1;
  }

  return str
}