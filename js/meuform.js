  $("#meuform").submit(function(e) {
    var url = "checharlogin.php"; 
    $.ajax({
           type: "POST",
           url: url,
           data: $("#meuform").serialize(),
           success: function(data)
           {
               alert(data);
           }
         });

    e.preventDefault();
});