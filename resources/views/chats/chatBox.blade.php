@extends('layouts.app-theme')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7">


            <!-- DIRECT CHAT -->
            <div id='chatapp' class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">{{$receiver->name}}</h3>

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" v-if="chats" v-chat-scroll>
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg" v-for="(chat,index) in chats" :key="index">

                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"></span>
                      <span class="direct-chat-timestamp float-right">@{{chat.created_at}}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{asset('theme/dist/img/user1-128x128.jpg')}}" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text" v-html="chat.messages"></div>
                    <!-- /.direct-chat-text -->
                  </div>
                </div>
                <div class="direct-chat-contacts"></div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" v-model="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary" @click="sendMessage">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 ">
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('script')
<script>
    $('document').ready(function(e){

        let view = new Vue({
            el:'#chatapp',
            data: {
                chats:[],
                message:'',
            },
            created() {
                this.fetchMessage();
            },
            methods: {
                sendMessage(){

                    if(this.message){
                        var data = {
                            created_at : '{{now()}}',
                            sender_id : '{{auth()->id()}}',
                            receiver_id : '{{$receiver->id}}',
                            messages : encodeEntities.encode(this.message),
                            status : 0
                        };

                        this.chats.push(data);

                        axios({
                            url:"{{url('/message')}}",
                            method: 'POST',
                            data:{
                                messages: this.message,
                                receiver_id: "{{$receiver->id}}"
                            },
                        }).then((res)=>{
                            if(res.status == 200){
                                this.message = '';
                            }
                        }).catch((err)=>{
                            console.log(err)
                        });
                    }else{
                        // alert('Enter message');
                        //Redirect focus to message box
                    }
                },
                fetchMessage(){
                    axios({
                        url: "{{url('/message',$receiver->id)}}",
                        method: 'GET',
                    }).then((res)=>{
                        this.chats = res.data;
                    }).catch((err)=>{
                        console.log(err);
                    });
                }
            },
        });
        Echo.private(`chats.{{auth()->id()}}`)
             .listen('Chats', (e) => {
                 let vm = view;
                vm.$data.chats = [...vm.$data.chats,e.chats]
         });
    });
</script>
@endsection
