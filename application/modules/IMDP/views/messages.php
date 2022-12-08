  <style type="text/css">
    .messagebox
    {
      width: 100%;
      height: 400px;
      border: 2px solid lightblue;
      border-radius: 10px;
      background-color: lightblue;
    }
    .message
    {
      margin: 10px;
      position: absolute;
      bottom: 30px;
      right: 20px;
      width: 80%;
    }
    .message-input
    {
      border-radius: 50px;
      width: 100%;
    }
    .message button
    {
      position: absolute;
      top: 5px;
      right: 5px;
      height: 30px;
      width: 30px;
      border: 1px solid gray;
      border-radius: 50%;
      background-color: white;
    }
    .message button:hover
    {
      background-color: lightblue;
      font-weight: bold;
    }
    .contact-img
    {
      height: 50px;
      border-radius: 50%;
    }
    #chatresults
    {
      height: 330px;
      padding: 10px;
      overflow-y: scroll;
    }
    .chat
    {
      max-width: 60%;
      background-color: white;
      margin-top: 10px;
      padding:5px 20px;
      border-radius: 50px;
      max-width: 70%;
    }
    .text-left
    {
      text-align: left;
    }
    .text-right
    {
      text-align: right;
    }
    #chatresults p
    {
      font-size: 11px;
      margin: 0px 10px;
      color: gray;
    }
  </style>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Messages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>IMDP">Home</a></li>
          <li class="breadcrumb-item active">Messages</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row mt-20">
                <div class="col-lg-1">
                  <input type="hidden" id="username" value="<?php echo $contact->username; ?>">
                  <img src="<?php echo base_url(); ?>assets/uploads/profile/<?php echo $contact->profile; ?>" class="contact-img">
                </div>
                <div class="col-lg-11">
                  <p><b><?php echo $contact->first." ".$contact->middle." ".$contact->last; ?></b></p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 mt-20">
                  <div class="messagebox">
                    <div id="chatresults">
                      <input type="hidden" id="chatcount" value="0">
                      <input type="hidden" id="thread" value="<?php echo $contact->id; ?>">
                      <?php
                      foreach($chats as $chat)
                      {
                        if($chat->thread == 0)
                        {
                          $temp = "text-right";
                        }
                        else
                        {
                          $temp = "text-left";
                        }
                      ?>
                        <div class="<?php echo $temp; ?>"><label class="chat"><?php echo $chat->message; ?></label><p><?php echo $chat->n_date."&emsp;".$chat->n_time; ?></p></div>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="message">
                      <form action="<?php echo base_url(); ?>IMDP/send" method="post">
                        <input type="text" name="message" class="form-control message-input" autocomplete="off">
                        <input type="hidden" name="username" value="<?php echo $contact->username; ?>">
                        <input type="hidden" name="thread" value="<?php echo $contact->id; ?>">
                        <button><i class="bi bi-arrow-right"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
        <script type='text/javascript'>
            var baseURL= "<?php echo base_url();?>";
          setInterval(function(){
            $(document).ready(function(){
                
                // Comment or remove the below change event code if you want send AJAX request from external script file
                var username = $('#username').val();
                $.ajax({
                    url:'<?php echo base_url(); ?>index.php/IMDP/getMessagesAJAX',
                    method: 'post',
                    data: {username: username},
                    dataType: 'json',
                    success: function(response){
                        var len = response.length;
                        var temp = $('#badge').text();
                        var thread = $('#thread').val();
                        var chatcount = $('#chatcount').val();
                        if(len > 0){
                           for(var i = 0; i<len; i++)
                           {
                            if(response[i].status == "1" && response[i].thread == thread)
                            {
                              $('#chatresults').append('<div class="text-left"><label class="chat">'+response[i].message+'</label><p>'+response[i].n_date+' &emsp; '+response[i].n_time+'</p></div>');
                              $.ajax({
                                  url:'<?php echo base_url(); ?>index.php/IMDP/setAsRead',
                                  method: 'post',
                                  data: {id: response[i].id,thread:thread},
                                  dataType: 'json',
                                  });
                              let scroll = document.getElementById('chatresults');
                              scroll.scrollTop = scroll.scrollHeight;
                            }
                           }
                        }
                    }
                });
            });
          },1000);
        </script>
<script>
  let scroll = document.getElementById('chatresults');
  scroll.scrollTop = scroll.scrollHeight;
</script>
</html>