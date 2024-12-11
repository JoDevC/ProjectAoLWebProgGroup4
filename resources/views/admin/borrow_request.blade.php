<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .center
        {
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
            margin-top: 60px;
        }

        th
        {
            background-color: skyblue;
            text-align: center;
            color: white;
            font-size: 15px;
            font-weight: bold;
            padding: 10px;
        }

        .center-align {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .book-img {
            height: 100px;
            width: 50px;
            padding-bottom: 15px;
        }




    </style>



  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table class="center">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Book Image</th>
                    <th>Change Status</th>
                </tr>

                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->user->phone }}</td>
                    <td>{{ $data->book->title }}</td>
                    <td>{{ $data->book->quantity }}</td>
                    <td>
                        
                        @if ($data->status == 'Approved')
                            <span style="color: greenyellow;">{{ $data->status }}</span>
                        @endif

                        @if ($data->status == 'Rejected')
                            <span style="color: red;">{{ $data->status }}</span>
                        @endif

                        @if ($data->status == 'Returned')
                            <span style="color: skyblue;">{{ $data->status }}</span>
                        @endif

                        @if ($data->status == 'Applied')
                            <span style="color: white;">{{ $data->status }}</span>
                        @endif

                        

                    </td>
                    <td class="center-align">
                        <img class="book-img" src="book/{{ $data->book->book_img }}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ url('approved_book', $data->id) }}">Approved</a>
                        <a class="btn btn-danger" href="{{ url('reject_book', $data->id) }}">Rejected</a>
                        <a class="btn btn-info" href="{{ url('return_book', $data->id) }}">Returned</a>
                    </td>
                </tr>
                @endforeach

                



            </table>



          </div>
        </div>
      </div>
        

        @include('admin.footer')
  </body>
</html>