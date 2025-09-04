<x-layout>
    <div id="userprofile">
      
        <div class="container">
            <i class="fa fa-user-circle"></i>
       
        <p><strong>First Name: </strong>   {{auth()->user()->firstname}}</p>
        <p><strong>Last Name: </strong>   {{auth()->user()->lastname}}</p>
        <p><strong>Email: </strong>{{auth()->user()->email}}</p>
        <p><strong>Telephone: </strong>{{auth()->user()->telephone}}</p>
        <p><strong>Gender: </strong>{{auth()->user()->gender}}</p>
        <p><strong>Address: </strong>{{auth()->user()->address}}</p>
        <p><strong>Region: </strong>{{auth()->user()->region}}</p>

        <a href="{{route('profile')}}"><button>Edit Profile</button></a>
         </div>
    </div>
    <style>
        #userprofile{
            padding: var(--page-padding);
            display: flex;
            justify-content: center;
        }
       #userprofile i{
            font-size: 120px;

        }
        .container{
            width: fit-content;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);
            gap: 12px;
        }
        #userprofile button{
            background: var(--accent-color);
            color: #fff;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>
</x-layout>