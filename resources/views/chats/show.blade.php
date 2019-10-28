@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

          {{--   @include('chats.messagedFriends')
  --}}
            <div class="col-md-3">

                <h4 class="title1">Messaged Friends</h4><br>

                @forelse ($messagedFriends as $Friends)

                    <div>

                        @if ($Friends->user1_id == auth()->id())

                            <a class="msg" href="" id="{{ $Friends->user2_id }}">

                                <img class="rounded-circle" style="width:1.5rem" src="/storage/{{ $Friends->user2->avatar }}">

                                <small>{{ $Friends->user2->name }}</small>

                            </a>

                        @else

                            <a class="msg" href="" id="{{ $Friends->user1_id }}">

                                <img class="rounded-circle" style="width:2rem" src="/storage/{{ $Friends->user1->avatar }}">

                                 <small>{{ $Friends->user1->name }}</small>

                            </a>

                        @endif

                    </div>

                @empty

                    <p>Start a conversation</p>

                @endforelse

            </div>



            <div class="col-md-7">

                <h4 class="title">Click on a user to start a conversation</h4>

                {{--  display messages  --}}
                <div id="rec" style="width: 100%"></div>

                {{--  message form   --}}
                <div>

                     <form style="display:none">

                        @csrf

                        <div class="form-group row">

                            <textarea name="message" class="form-control" style="width:80%;" placeholder="Type here" id="message" cols="40" rows="2"></textarea>

                            <button class="btn btn-primary" type="submit">Send</button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

    @section('extra-js')

        <script>

            $(document).ready(function(){
                $("button.btn").attr("disabled",true);
                $("textarea#message").keyup(function(){
                    if(this.value.length >= 1){
                        $("button.btn").attr("disabled",false);
                    }
                    else{
                        $("button.btn").attr("disabled",true);
                    }
                })
                $("a.msg").click(function(e){
                    e.preventDefault();
                    $(".title").css("display","none")
                    var user_id = e.currentTarget.id;
                    var new_msg = $("span#new_msg");
                    if(new_msg){
                        new_msg.remove();
                    }

                    var new_div = $("div#span");
                    if(new_div){
                        new_div.remove();
                    }
                    axios({
                        url: `/message/${user_id}`,
                        method: "get",
                        dataType: "json"
                    })
                    .then(res => {
                        if(res.data){
                            var new_messages = res.data;
                            var messages = "";
                            $.each(new_messages,(i,msg)=>{
                                if({{ auth()->id() }} == msg.sender_id){
                                    messages += "<div style='margin-left:50%;' id='span'>"+"<span class='btn btn-primary''>"+ msg.message+
                                                "</span><br><br>"+"</div>";
                                }
                                else{
                                    messages += "<div id='span'>"+"<span class='btn btn-info' style='margin-left: 5%;'>"+ msg.message+
                                                "</span><br><br>"+"</div>";
                                }
                            })
                            $("div#rec").append(messages);
                            $("form").css("display","block")

                        }
                    })
                    .catch(err => {
                        console.log("an error occured while making the ajax call to the server: " + err);
                    })
                    $("button.btn").click(function(e){
                        e.stopPropagation();
                        e.preventDefault();
                        var message = $("#message").val();
                        axios({
                            url: "/messages",
                            data: {message : message,
                                    user: user_id
                                },
                            method: "post",
                            dataType: "json"
                        })
                        .then(res =>{
                            if(res.data){
                                var newMesage = res.data.message;
                                    $("div#rec").append("<div style='margin-left:50%;' id='new_msg'><span class='btn btn-primary'>"+newMesage+"</span><br><br></div>");
                                    $("#message").val("");

                            }
                        })
                        .catch(err => {
                            console.log("an error occured while making the ajax call: " + err);
                            $("#message").val("");
                        })

                    })

                })

            })

        </script>

    @endsection

@endsection
