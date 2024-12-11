<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style type="text/css">
        .table_center
        {
            text-align: center;
            margin: auto;
            border: 1px solid whitesmoke;
            margin-top: 50px;
        }

        th
        {
            background-color: skyblue;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        .img_book
        {
            width: 150px;
            height: auto;
            padding: 10px;
        }

        .img_author {
            width: 80px;
            height: 80px; /* Menjamin bentuk lingkaran sempurna */
            border-radius: 50%;
            border: 2px solid #ccc; /* Border tipis untuk mempertegas gambar */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan */
            object-fit: cover; /* Menyesuaikan gambar agar tetap proporsional */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Animasi untuk hover */
        }

        .img_author:hover {
            transform: scale(1.1); /* Membesarkan sedikit saat hover */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Bayangan lebih intens saat hover */
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

            @if(session()->has('message'))

                  <div class="alert alert-success">
                    {{ session()->get('message') }}

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  </div>
                  

                  @endif

            <div>

                <table class="table_center">

                    <tr>
                        <th>Book Image</th>
                        <th>Book Title</th>
                        <th>Author Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Author Image</th>
                        <th>Delete</th>
                        <th>Update</th>

                    </tr>

                    @foreach ($book as $book)
                    <tr>
                        <td><img class="img_book" src="book/{{ $book->book_img }}" alt=""></td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author_name }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->category->cat_title }}</td>
                        <td><img class="img_author" src="author/{{ $book->author_img }}" alt=""></td>
                        <td><a onclick="confirmation(event)" href="{{ url('book_delete', $book->id) }}" type="button" class="btn btn-danger">Delete</a></td>
                        <td><a href="{{ url('edit_book', $book->id) }}" type="button" class="btn btn-info">Update</a></td>
                    </tr>
                    @endforeach
                    

                </table>



            </div>



          </div>
        </div>
      </div>

        @include('admin.footer')

        <script type="text/javascript">
            function confirmation(ev){
                ev.preventDefault();
                var urlToDirect = ev.currentTarget.getAttribute('href');
                console.log(urlToDirect);

                swal({
                    title: "Are you sure to delete this?",
                    text: "You will not be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willCancel)=> {
                    if(willCancel){
                        window.location.href = urlToDirect;
                    }
                    });
          
            }

        </script>
  </body>
</html>