<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?> | Olivia Cake</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
/* ---- CSS (Aapka original style yahan aayega) ---- */
*{margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif;}
body{background:#2b001f; color:#ffd6e8;}
header{background:#3b002d; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:100;}
header h1{font-size:22px; color:#ff85b3;}
nav a{margin-left:15px; text-decoration:none; color:#ffd6e8; font-weight:500;}
nav a:hover{color:#ff85b3;}
section{padding:40px 20px; min-height:70vh;}
h2{text-align:center; margin-bottom:20px; color:#ff85b3;}
.btn{display:inline-block; background:#ff85b3; color:white; padding:10px 18px; border-radius:20px; text-decoration:none; border:none; cursor:pointer;}
.home-hero{display:flex; flex-wrap:wrap; justify-content:center; align-items:center; background:linear-gradient(135deg, #4d003d, #660055); padding:60px 20px; border-radius:20px; max-width:1000px; margin:auto;}
.cake-grid{display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px;}
.cake-card{background:#4d003d; border-radius:15px; padding:15px; text-align:center;}
.cake-card img{width:100%; border-radius:10px;}
footer{background:#3b002d; text-align:center; padding:20px; margin-top:30px;}
input, select, textarea{width:100%; padding:10px; margin:5px 0; border-radius:8px; border:none; background:#2b001f; color:white;}
</style>
</head>
<body>

<header>
  <h1>Olivia Cake 🍰</h1>
  <nav>
    <a href="index.php?page=home">Home</a>
    <a href="index.php?page=about">About</a>
    <a href="index.php?page=menu">Cakes</a>
    <a href="index.php?page=cart">Cart</a>
    <a href="index.php?page=contact">Contact</a>
  </nav>
</header>

<main>
  <?php echo $content; ?>
</main>

<footer>
  <p>📞 0300-0000000 | ✉ bentobliss@email.com</p>
  <p>© 2025 Bento Bliss</p>
</footer>

<script>
function toggleCustomBox(id){
  const box = document.getElementById(id);
  box.style.display = (box.style.display === 'block') ? 'none' : 'block';
}
// Mazeed JavaScript (Cart logic wagera) yahan add karein
</script>

</body>
</html>