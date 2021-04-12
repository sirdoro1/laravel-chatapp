@extends('layouts.app-theme')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Contacts</h1>
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
          <section id='chatapp' class="col-md-12">
            <div class="row">

                <!-- DIRECT CHAT -->
                <div class="col-md-6">
                        <div class="card direct-chat direct-chat-primary direct-chat-contacts-open">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>

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
                            <div class="direct-chat-messages"></div>
                            <!--/.direct-chat-messages-->
                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                            <ul class="contacts-list">
                                @forelse($contacts as $contact)
                                <li>
                                    <a href="{{url('chats',$contact->id)}}">
                                        <img class="contacts-list-img" src="{{asset('theme/dist/img/user1-128x128.jpg')}}" alt="User Avatar">

                                        <div class="contacts-list-info">
                                        <span class="contacts-list-name">
                                            {{$contact->name}}
                                            <small class="contacts-list-date float-right">{{$contact->created_at->diffForHumans()}}</small>
                                        </span>
                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                        </div>
                                    </a>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                            <!-- /.contacts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-6">

                    <div class="card direct-chat direct-chat-primary">
                    <div class="card-header">
                        <h3 class="card-title">Direct Chat</h3>

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
                        <div class="direct-chat-messages" v-chat-scroll>
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user1-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user3-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            You better believe it!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user1-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user3-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            You better believe it!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user1-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user3-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            You better believe it!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user1-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            Working with AdminLTE on a great new app! Wanna join?
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{asset('theme/dist/img/user3-128x128.jpg')}}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            I would love to.
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- Contacts are loaded here -->
                        <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="{{asset('theme/dist/img/user1-128x128.jpg')}}" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                </span>
                                <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="{{asset('theme/dist/img/user7-128x128.jpg')}}" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Sarah Doe
                                    <small class="contacts-list-date float-right">2/23/2015</small>
                                </span>
                                <span class="contacts-list-msg">I will be waiting for...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="{{asset('theme/dist/img/user3-128x128.jpg')}}" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Nadia Jolie
                                    <small class="contacts-list-date float-right">2/20/2015</small>
                                </span>
                                <span class="contacts-list-msg">I'll call you back at...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="{{asset('theme/dist/img/user5-128x128.jpg')}}" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Nora S. Vans
                                    <small class="contacts-list-date float-right">2/10/2015</small>
                                </span>
                                <span class="contacts-list-msg">Where is your new...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="{{asset('theme/dist/img/user6-128x128.jpg')}}" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    John K.
                                    <small class="contacts-list-date float-right">1/27/2015</small>
                                </span>
                                <span class="contacts-list-msg">Can I take a look at...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                            <a href="#">
                                <img class="contacts-list-img" src="{{asset('theme/dist/img/user8-128x128.jpg')}}" alt="User Avatar">

                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Kenneth M.
                                    <small class="contacts-list-date float-right">1/4/2015</small>
                                </span>
                                <span class="contacts-list-msg">Never mind I found...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                            </li>
                            <!-- End Contact Item -->
                        </ul>
                        <!-- /.contacts-list -->
                        </div>
                        <!-- /.direct-chat-pane -->
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
                </div> --}}
                <!--/.direct-chat -->

                </div>
            </div>
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

        var view = new Vue({
            el:'#chatapp',
            data: {
                message:'',
                chats:[],
            },
            methods: {
                sendMessage:function(){
                    if(this.message){
                        axios({
                            url:"{{url('/message')}}",
                            method: 'POST',
                            data:{
                                messages: this.messages,
                                receiver_id:'',
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
                }
            },
        });

        Echo.channel('chats')
             .listen('Chats', (e) => {
                 console.log(e);
         });
    });
</script>
@endsection
