<?php
$path = ".";
$user = "Guest";

require "$path/functions/basic.php";
startContainer($path, $user);
?>
<main>

    <html>
 <head>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
      
        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 0;
        }
        .hero .text {
            max-width: 50%;
        }
        .hero .text h1 {
            font-size: 48px;
            color:black;
        }
        .hero .text p {
            font-size: 18px;
            color:black;
            margin: 20px 0;
        }
        .hero .text .buttons {
            display: flex;
            gap: 20px;
        }
        .hero .text .buttons a {
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            color:black;
            font-weight: 500;
        }
        .hero .text .buttons .btn-primary {
            background-color: #00c2ff;
        }
        .hero .text .buttons .btn-secondary {
            background-color: #6e00ff;
        }
        .hero .image {
            max-width: 50%;
        }
        .hero .image img {
            width: 100%;
        }
        .stats {
            display: flex;
            justify-content: space-between;
            margin: 50px 0;
        }
        .stats .stat {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }
        .stats .stat h3 {
            font-size: 24px;
            margin: 10px 0;
        }
        .stats .stat p {
            font-size: 18px;
            color: #666;
        }
        .how-it-works {
            text-align: center;
            margin: 50px 0;
        }
        .how-it-works h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .how-it-works .steps {
            display: flex;
            justify-content: space-between;
        }
        .how-it-works .step {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }
        .how-it-works .step img {
            width: 50px;
            margin-bottom: 20px;
        }
        .how-it-works .step h3 {
            font-size: 24px;
            margin: 10px 0;
        }
        .how-it-works .step p {
            font-size: 18px;
            color: #666;
        }
        .footer {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            margin: 50px 0;
        }
        .footer h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .footer .logos {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .footer .logos img {
            width: 100px;
        }
  </style>
 </head>
 <body>
  <div class="container">
   <div class="header">
  
   </div>
   <div class="hero">
    <div class="text">
     <h1>
      Hire Candidates With PlacementPlus!
     </h1>
     <p>
      Over 20,000,000 Job Openings and 20,000,000 Candidates Across Mumbai • Pune • Delhi • Bengaluru &amp; More
     </p>
     <div class="buttons">
      <a class="btn-primary" href="#">
       I want to hire Staff
      </a>
      <a class="btn-secondary" href="#">
       I want a job
      </a>
     </div>
    </div>
    <div class="image">
     <img alt="Illustration of hiring process with documents and magnifying glass" height="500" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-kp3BsJb7yXTe5worp2oBJDXT.png?st=2024-09-08T18%3A51%3A11Z&amp;se=2024-09-08T20%3A51%3A11Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T22%3A11%3A04Z&amp;ske=2024-09-08T22%3A11%3A04Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=ANqLqyxXaBrHYS7yNVcE%2Bc2IVD9nCeVeS1oIqMz3lFc%3D" width="500"/>
    </div>
   </div>
   <div class="stats">
    <div class="stat">
     <h3>
      20,000,000
     </h3>
     <p>
      Job Seekers
     </p>
    </div>
    <div class="stat">
     <h3>
      5,000,000
     </h3>
     <p>
      Candidate Calls Monthly
     </p>
    </div>
    <div class="stat">
     <h3>
      15,000
     </h3>
     <p>
      Jobs Posted Monthly
     </p>
    </div>
   </div>
   <div class="how-it-works">
    <h2>
     How We Work
    </h2>
    <div class="steps">
     <div class="step">
      <img alt="Icon representing posting a job" src="https://placehold.co/50x50"/>
      <h3>
       Post Your Job
      </h3>
      <p>
       Post your job on our platform and reach millions of candidates.
      </p>
     </div>
     <div class="step">
      <img alt="Icon representing advertising your job" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-wW4NyaBwPdzCGaR4nburzR67.png?st=2024-09-08T18%3A51%3A12Z&amp;se=2024-09-08T20%3A51%3A12Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T23%3A44%3A36Z&amp;ske=2024-09-08T23%3A44%3A36Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=ML6lm5X8bdfqXwNa8HGm1l2UYLin7lecu%2B/lF9/KuO0%3D" width="50"/>
      <h3>
       We Advertise Your Job
      </h3>
      <p>
       We advertise your job to reach the right candidates.
      </p>
     </div>
     <div class="step">
      <img alt="Icon representing candidates calling you" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-IZnnAmnXe4izOsM2zMcHhsMQ.png?st=2024-09-08T18%3A51%3A08Z&amp;se=2024-09-08T20%3A51%3A08Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T21%3A46%3A22Z&amp;ske=2024-09-08T21%3A46%3A22Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=kyeU40XM2hNvlCK1IK%2BqZZkmGckkZlmG4PSQrlfmZi0%3D" width="50"/>
      <h3>
       Candidates Call You
      </h3>
      <p>
       Candidates will call you directly to discuss the job.
      </p>
     </div>
     <div class="step">
      <img alt="Icon representing taking interviews" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-tIBnzsWxWq7a94ntdvqPPemO.png?st=2024-09-08T18%3A51%3A11Z&amp;se=2024-09-08T20%3A51%3A11Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T22%3A12%3A27Z&amp;ske=2024-09-08T22%3A12%3A27Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=t82gSKTHcem7qc5Hd/yOu%2BL6ncRme3eyy7CicahVh3w%3D" width="50"/>
      <h3>
       Take Interview &amp; Hire
      </h3>
      <p>
       Take interviews and hire the best candidates for your job.
      </p>
     </div>
    </div>
   </div>
   <div class="footer">
    <h2>
     50K+ Happy Companies
    </h2>
    <div class="logos">
     <img alt="Company logo 1" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-6bdr1t5XVqjAg3WZvfK1umDc.png?st=2024-09-08T18%3A51%3A08Z&amp;se=2024-09-08T20%3A51%3A08Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T21%3A40%3A17Z&amp;ske=2024-09-08T21%3A40%3A17Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=jbkJnfDpWVLE3jvMCae2kbeJ24hPs8Wkk102CDVZTqo%3D" width="100"/>
     <img alt="Company logo 2" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-hEpeNB1gqi4LzrJtvTPTvR5m.png?st=2024-09-08T18%3A51%3A13Z&amp;se=2024-09-08T20%3A51%3A13Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T22%3A31%3A39Z&amp;ske=2024-09-08T22%3A31%3A39Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=g549Z0YVdw533lG5%2BJqIYrDbwUcRZ3ZdppmIl79n7W4%3D" width="100"/>
     <img alt="Company logo 3" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-emgIsC9xIYL7l8zAXcnb9nmZ.png?st=2024-09-08T18%3A51%3A10Z&amp;se=2024-09-08T20%3A51%3A10Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T21%3A46%3A54Z&amp;ske=2024-09-08T21%3A46%3A54Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=5GGyKSU//td48uFNKAGyUc/bEKEcezY6CV1oyVShGok%3D" width="100"/>
     <img alt="Company logo 4" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-82QyLubT6NvCmk4b6iTpn0oW.png?st=2024-09-08T18%3A51%3A11Z&amp;se=2024-09-08T20%3A51%3A11Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T22%3A11%3A15Z&amp;ske=2024-09-08T22%3A11%3A15Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=040HGV168gEUSPr59E9obZwCRDk9GWeNhWAM2jRSivc%3D" width="100"/>
     <img alt="Company logo 5" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-RcpoXHkzChYnDbFAyeQ8tamr/user-ehrvabJ3DufsCu8YJ7PqY5gl/img-sRwcpHtbIOuWqXKECyDQNTAl.png?st=2024-09-08T18%3A51%3A11Z&amp;se=2024-09-08T20%3A51%3A11Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T22%3A26%3A34Z&amp;ske=2024-09-08T22%3A26%3A34Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=LVMJ5lMi22hdfAMVpSCue7OrRIhyOc9vhSmq39ctkEM%3D" width="100"/>
    </div>
   </div>
  </div>
 </body>
</html>
</main>
<?php endContainer($path); ?>