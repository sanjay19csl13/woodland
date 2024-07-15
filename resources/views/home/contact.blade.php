<!DOCTYPE html>
<html>

<head>
  @include('home.head')
  <style>
    .containercon {
      max-width: 1200px;
      margin: 0 auto;
      margin-bottom: 20px;


    }

    .leading-relaxed {
      line-height: 1.625;
      font-size: 14px;
    }



    .form-label {
      display: block;
      margin-bottom: 0.5rem;
    }



    .form-control {
      display: block;
      width: 100%;
      padding: 0.5rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
      border-color: #80bdff;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-indigo {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.5rem 1rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      color: #fff;
      background-color: #6366f1;
      border-color: #6366f1;
      text-decoration: none;
    }

    .contact {
      background-color: #0b8e85;
    }
  </style>
</head>

<body>

  @include('home.header')
  <section class="text-gray-600 body-font  relative">
    <div class="row">
      <div class="col-12 text-center my-5 pt-5">
        <h1 class="heading-1 mt-3 mb-3">Contact</h1>
        <hr class="mx-auto ">
        <span>Introducing our latest furniture: elegant, comfortable, stylish, durable, modern, versatile, ergonomic, space-saving, premium craftsmanship</span>
      </div>
    </div>
    <div class="container containercon px-5 py-24 mx-auto mb-5 d-flex flex-wrap">
      <div class="col-lg-8 col-md-6 col-sm-12  rounded-lg overflow-hidden me-md-3  d-flex flex-column position-relative">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5240.384337635823!2d-89.05729075886727!3d33.7803960811746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x888120886d377cc9%3A0x3a65a9c25f5d59e5!2sWoodland%20Furniture!5e1!3m2!1sen!2sin!4v1719247708184!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
      <div class="col-lg-4 col-md-6 col-sm-12  p-4 mt-4 mt-md-0 contact ">


        <form class="contact" action="{{ route('contact.send')}}" method="POST">
          @csrf
          <h2 class="text-white text-lg mb-1 font-weight-medium title-font">Contact</h2>
          <p class="leading-relaxed mb-4 text-white">Post-ironic portland shabby chic echo park, banjo fashion axe</p>
          <div class="mb-3">
            <label for="name" class="form-label text-sm text-white">Name</label>
            <input type="text" id="name" name="name" class="form-control">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label text-sm text-white">Email</label>
            <input type="email" id="email" name="email" class="form-control">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="message" class="form-label text-sm text-white">Message</label>
            <textarea id="message" name="message" class="form-control" rows="4"></textarea>
            @error('message')
            <div class="text-danger">{{ $message }}</div>
            @enderror

          </div>
          <button type="submit" class="btn btn-warning text-white">Send</button>
          <p class="text-xs text-white mt-3">Chicharrones blog helvetica normcore iceland tousled brook viral artisan.</p>
        </form>
      </div>
    </div>
  </section>


  @include('home.footer')

</body>

</html>