<?php 
session_start();
include('include/header.php'); ?>

<div class="container about-page my-5">
  <div class="row">
    <div class="col-md-5 mb-3 my-5">
      <div class="mb-3">
        <img src="img/about1.png" class="img-fluid rounded shadow-lg animated fadeInLeft" alt="About Image 1">
      </div>
      <div>
        <img src="img/about2.png" class="img-fluid rounded shadow-lg animated fadeInRight" alt="About Image 2">
        
      </div>
    </div>

    <div class="col-md-7">
      <h1 class="display-4 mb-4 my-5">G.K Almirah</h1>
      <p class="leads font-weight-bold mt-4">
          Our company's mission is to create employment opportunities.
        </p>
      <p class="lead animated fadeInUp">
        GK ALMIRAH, a renowned brand known as GK Triveni, is a leading manufacturer of powder-coated steel wardrobes. As a subsidiary of the GK Group, we are committed to delivering durable, high-quality products that offer exceptional value for money. Our products are available in over 400 stores, ensuring widespread access to our top-tier solutions.
      </p>
      <p class="lead animated fadeInUp delay-1s">
        Alongside GK Almirah, Guru Kripa Steel Works, also under the GK Group umbrella, is a prominent manufacturer of Stainless Steel Beds, Steel Trolleys, Steel Almirahs, Wrought Iron Beds, Steel Tables, Stainless Steel Chairs, Stainless Steel Dining Sets, Dual Desk Benches, Stainless Steel Shoe Racks, and Sofa Sets, among other items. This extensive range reflects our dedication to meeting diverse customer needs with innovative and reliable products.
      </p>
      <p class="lead animated fadeInUp delay-2s">
        At GK Almirah, we pride ourselves on adopting the latest technology and maintaining a positive attitude, which has driven our success in the industry. Our focus on personalized attention to client needs and prompt responses has garnered us the trust and loyalty of our customers.
      </p>
      <p class="lead animated fadeInUp delay-3s">
        We assure you of our unwavering commitment to complete your tasks to your utmost satisfaction and within the stipulated time. Thank you for considering GK Almirah, where quality and client satisfaction are our top priorities.
      </p>
      
    </div>
  </div>
</div>

<?php include('include/footer.php'); ?>

<style>
  /* .about-page {
    background-color: #d1bea8;
    padding: 60px 20px;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
  } */
  .display-4 {
    font-size: 3rem;
    font-weight: 600;
    color: #002147;
    /* font-family: 'Great Vibes', cursive; */
  }
  .lead {
    font-size: 1.15rem;
    line-height: 1.7;
    color: #002147;
  }
   .leads {
    font-size: 1.5rem;
    line-height: 1.7;
    color: #002147;
  }
  
  .font-weight-bold {
    font-weight: 700;
    color: #FFFFFF;
    
  }
  .img-fluid {
    border-radius: 15px;
    transition: transform 0.3s ease-in-out;
  }
  .img-fluid:hover {
    transform: scale(1.05);
  }
  .shadow-lg {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  .my-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
  }
  .mb-4 {
    margin-bottom: 1.5rem !important;
  }
  .animated {
    animation-duration: 1s;
    animation-fill-mode: both;
  }
  .fadeInLeft {
    animation-name: fadeInLeft;
  }
  .fadeInRight {
    animation-name: fadeInRight;
  }
  .fadeInUp {
    animation-name: fadeInUp;
  }
  .delay-1s {
    animation-delay: 1s;
  }
  .delay-2s {
    animation-delay: 2s;
  }
  .delay-3s {
    animation-delay: 3s;
  }

  @keyframes fadeInLeft {
    from {
      opacity: 0;
      transform: translate3d(-100%, 0, 0);
    }
    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }

  @keyframes fadeInRight {
    from {
      opacity: 0;
      transform: translate3d(100%, 0, 0);
    }
    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translate3d(0, 100%, 0);
    }
    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }

  .about-page {
    background-color: #d1bea8;
    padding: 60px 20px;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    margin: 0 auto; /* Center the container horizontally */
    max-width: 100%; /* Ensure it doesn’t overflow the screen */
    width: 100%;
}

.container {
    max-width: 100%; /* Make sure the container takes full width */
    margin: 0 auto; /* Center the container horizontally */
    padding: 0 15px; /* Add padding to avoid touching the screen edges */
}

.row {
    margin: 0; /* Remove any extra margin */
    padding: 0; /* Remove any extra padding */
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center the content */
}

.col-md-5, .col-md-7 {
    padding-left: 15px;
    padding-right: 15px;
    box-sizing: border-box; /* Ensure padding doesn't affect width */
}

@media (max-width: 768px) {
    .about-page {
        padding: 40px 15px; /* Adjust padding for smaller screens */
    }
    
    .container {
        padding: 0 15px;
        margin: 0 auto; /* Center the container horizontally */
    }
    
    .col-md-5, .col-md-7 {
        width: 100%; /* Make sure columns take full width on mobile */
        padding: 0; /* Reset padding for mobile */
        margin-bottom: 20px; /* Add some space between sections */
    }

    .row {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column; /* Stack columns vertically */
        align-items: center; /* Center the content */
    }
}

@media (max-width: 576px) {
    .about-page {
        padding: 30px 10px;
    }
    
    .container {
        padding: 0 10px;
        margin: 0 auto; /* Center the container horizontally */
    }
    
    .col-md-5, .col-md-7 {
        padding: 0;
        width: 100%;
        margin-bottom: 15px; /* Add some space between sections */
    }
}

</style>
