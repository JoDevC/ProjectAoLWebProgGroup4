<!DOCTYPE html>
<html lang="en">

  <head>
    @include('home.css')

    <style type="text/css">

    .table_deg
    {
        border: px solid white;
        margin: auto;
        text-align: center;
        margin-top: 100px;
    }

    th
    {
        background-color: skyblue;
        color: white;
        font-weight: bold;
        font-size: 18px;
        padding: 15px;
    }

    td
    {
        color: white;
        /* background-color: black; */
        border: 1px solid white;
    }

    </style>


  </head>

  @include('home.header')

  <div class="currently-market">
    <div class="container">
      <div class="row">

        @if(session()->has('message'))

                  <div style="padding-top: 10px;" class="alert alert-success">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message') }}

                   
                  </div>
                  

        @endif


        <table class="table_deg">
            <tr>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Book Status</th>
                <th>Book Image</th>
                <th>Cancel Buy</th>
            </tr>
            @foreach ($data as $data)
            <tr>
                <td>{{ $data->book->title }}</td>
                <td>{{ $data->book->author_name }}</td>
                <td>{{ $data->status }}</td>
                <td>
                    <img style="height=120px; width: 80px; margin:auto;" src="book/{{ $data->book->book_img }}" alt="">
                </td>

                <td>
                  @if ($data->status == 'Applied')
                    <a href="{{ url('cancel_buy', $data->id) }}" class="btn btn-danger">Cancel</a>

                  @else
                    <p style="color: white; font-weight: bold;">Not Allowed</p>
                  @endif


                </td>
            </tr>
            @endforeach
            
        </table>


      </div>
    </div>
  </div>

  @include('home.footer')

  </body>
</html>