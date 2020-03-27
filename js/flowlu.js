$("#flowluSubmit").click(function(){
  var name = $("input[name=name]").val()
  var email = $("input[name=email]").val()
  var ruicode = $("input[name=ruicode]").val()
  var message = $("textarea[name=message]").val()
  $.ajax({
      url: "https://kompot.flowlu.com/api/v1/module/crm/lead/create/?api_key=" + getenv('FLOWLU_API_KEY'),
      type: 'POST',
      dataType: 'json',
      contentType: 'application/json',
      data: {"name":name,"email":email,"ruicode":ruicode,"message":message,"pipeline_id":"20"},
      success: function (data) {
        console.log("success!",JSON.stringify(data));
      },
      error: function(){
        console.log("Cannot get data");
      }
  });
});
