<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      .div_center {
        text-align: center;
        margin: 0 auto;
        max-width: 600px;
        background-color: #333;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      }
    
      .title {
        color: white;
        padding: 20px 0;
        font-size: 28px;
        font-weight: bold;
      }
    
      label {
        display: inline-block;
        width: 150px;
        font-weight: bold;
        color: white;
        margin-right: 10px;
      }
    
      .div_pad {
        margin: 15px 0;
        display: flex;
        align-items: center;
      }
    
      input[type="text"],
      textarea,
      select {
        width: 100%;
        padding: 8px;
        margin-left: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
    
      textarea {
        resize: none;
        height: 100px;
      }
    
      .btn {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        color: white;
        background-color: #17a2b8;
        cursor: pointer;
      }
    
      .btn:hover {
        background-color: #138496;
      }
    
      img {
        display: block;
        margin: 10px auto;
        width: 80px;
        border-radius: 5px;
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
              <h1 class="title">Update Book</h1>
            
              <form action="{{ url('update_book', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            
                <div class="div_pad">
                  <label for="title">Book Title</label>
                  <input type="text" name="title" id="title" value="{{ $data->title }}" required>
                </div>
            
                <div class="div_pad">
                  <label for="author_name">Author Name</label>
                  <input type="text" name="author_name" id="author_name" value="{{ $data->author_name }}" required>
                </div>
            
                <div class="div_pad">
                  <label for="price">Price</label>
                  <input type="text" name="price" id="price" value="{{ $data->price }}" required>
                </div>
            
                <div class="div_pad">
                  <label for="quantity">Quantity</label>
                  <input type="text" name="quantity" id="quantity" value="{{ $data->quantity }}" required>
                </div>
            
                <div class="div_pad">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" required>{{ $data->description }}</textarea>
                </div>
            
                <div class="div_pad">
                  <label for="category">Category</label>
                  <select name="category" id="category">
                    <option value="{{ $data->category_id }}">{{ $data->category->cat_title }}</option>
                    @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                    @endforeach
                  </select>
                </div>
            
                <div class="div_pad">
                  <label for="">Current Book Image</label>
                  <img src="/book/{{ $data->book_img }}" alt="Current Book Image">
                </div>
            
                <div class="div_pad">
                  <label for="book_img">Change Book Image</label>
                  <input type="file" name="book_img" id="book_img">
                </div>

                <div class="div_pad">
                  <label for="">Current Author Image</label>
                  <img src="/author/{{ $data->author_img }}" alt="Current Author Image">
                </div>
            
                <div class="div_pad">
                  <label for="author_img">Change Author Image</label>
                  <input type="file" name="author_img" id="author_img">
                </div>
            
                <div class="div_pad">
                  <input class="btn" type="submit" value="Update">
                </div>
              </form>
            </div>
            


          </div>
        </div>
      </div>
        

        @include('admin.footer')
  </body>
</html>