<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')


    <style type="text/css">
        .div_center {
          text-align: center;
          margin: auto;
          width: 50%; 
          background-color: #f5f5f5; 
          padding: 30px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
      
        .title_deg {
          color: black;
          padding-bottom: 25px;
          font-size: 35px;
          font-weight: bold;
        }
      
        label {
          display: inline-block;
          width: 200px;
          font-size: 16px;
          text-align: left;
        }
      
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
          width: calc(100% - 220px); 
          padding: 8px;
          border: 1px solid #ccc;
          border-radius: 4px;
          font-size: 14px;
        }
      
        textarea {
          height: 100px;
        }
      
        .div_pad {
          padding: 10px 0;
          display: flex;
          justify-content: flex-start;
          align-items: center;
        }
      
        input[type="submit"] {
          background-color: #007bff;
          color: white;
          padding: 10px 20px;
          font-size: 16px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          margin-left: 200px; /* Agar submit button sejajar dengan label */
        }
      
        input[type="submit"]:hover {
          background-color: #0056b3;
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

            <div class="div_center">
                <h1 class="title_deg">Add Books</h1>
              
                <form action="{{ url('store_book') }}" method="POST" enctype="multipart/form-data">
                  @csrf
              
                  <div class="div_pad">
                    <label for="book_name">Book Title</label>
                    <input type="text" id="book_name" name="book_name">
                  </div>
              
                  <div class="div_pad">
                    <label for="author_name">Author Name</label>
                    <input type="text" id="author_name" name="author_name">
                  </div>
              
                  <div class="div_pad">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price">
                  </div>
              
                  <div class="div_pad">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity">
                  </div>
              
                  <div class="div_pad">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"></textarea>
                  </div>
              
                  <div class="div_pad">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                      <option value="">Select a Category</option>
                      @foreach ($data as $data)
                      <option value="{{ $data->id }}">{{ $data->cat_title }}</option>
                      @endforeach
                    </select>
                  </div>
              
                  <div class="div_pad">
                    <label for="book_img">Book Image</label>
                    <input type="file" id="book_img" name="book_img">
                  </div>
              
                  <div class="div_pad">
                    <label for="author_img">Author Image</label>
                    <input type="file" id="author_img" name="author_img">
                  </div>
              
                  <div class="div_pad">
                    <input type="submit" value="Add Book" class="btn btn-info">
                  </div>
                </form>
              </div>
              


          </div>
        </div>
    </div>

        @include('admin.footer')
  </body>
</html>