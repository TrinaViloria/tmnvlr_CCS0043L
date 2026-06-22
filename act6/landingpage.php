<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dog Registry Landing Page</title>

<style>

:root{
    --bg: #fff1f6;
    --panel: rgba(255,255,255,0.95);
    --panel-border: rgba(190, 52, 108, 0.14);
    --text: #4a1f34;
    --muted: #8a5c72;
    --accent: #e83e8c;
    --accent-dark: #bf216f;
    --accent-soft: #fde1ec;
    --row-hover: #fff4f8;
    --shadow: 0 24px 60px rgba(132, 32, 74, 0.16);
}

*{
	box-sizing: border-box;
}

body{
	margin: 0;
	min-height: 100vh;
	color: var(--ink);
	font-family: "Trebuchet MS", "Gill Sans", sans-serif;
	background:
		linear-gradient(rgba(255, 250, 246, 0.72), rgba(253, 243, 235, 0.78)),
		url("https://i.pinimg.com/736x/0d/5b/ad/0d5bad722948b604eaca32f131cde734.jpg") center/cover no-repeat fixed;
}

.wrap{
	width: min(960px, calc(100% - 24px));
	margin: 18px auto;
	background: var(--card);
	border: 1px solid var(--line);
	border-radius: 26px;
	box-shadow: var(--shadow);
	overflow: hidden;
}

.hero{
	padding: 36px 24px 24px;
	position: relative;
	isolation: isolate;
}

.hero::before,
.hero::after{
	content: "";
	position: absolute;
	border-radius: 999px;
	z-index: -1;
	filter: blur(2px);
}

.hero::before{
	width: 160px;
	height: 160px;
	right: -50px;
	top: -42px;
	background: rgba(255, 107, 53, 0.2);
}

.hero::after{
	width: 130px;
	height: 130px;
	left: -38px;
	bottom: -24px;
	background: rgba(42, 157, 143, 0.18);
}

.badge{
	display: inline-block;
	margin-bottom: 12px;
	padding: 7px 12px;
	border-radius: 999px;
	font-size: 0.76rem;
	font-weight: 800;
	letter-spacing: 0.06em;
	color: var(--accent-dark);
	background: rgba(255, 107, 53, 0.16);
}

h1{
	margin: 0;
	font-size: clamp(1.8rem, 4.5vw, 3rem);
	line-height: 1.08;
	letter-spacing: -0.03em;
}

.lead{
	max-width: 640px;
	margin: 12px 0 0;
	font-size: 1rem;
	line-height: 1.55;
	color: var(--ink-soft);
}

.cards{
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 14px;
	padding: 0 24px 24px;
}

.card{
	background: #ffffff;
	border: 1px solid var(--line);
	border-radius: 18px;
	padding: 18px;
	box-shadow: 0 12px 24px rgba(122, 60, 35, 0.08);
}

.card h2{
	margin: 0;
	font-size: 1.15rem;
}

.card p{
	margin: 8px 0 14px;
	color: var(--ink-soft);
	line-height: 1.5;
}

.btns{
	display: flex;
	gap: 10px;
	flex-wrap: wrap;
}

.btn{
	text-decoration: none;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 8px;
	padding: 10px 14px;
	border-radius: 12px;
	font-weight: 700;
	transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn-primary{
	color: #fff;
	background: linear-gradient(135deg, var(--accent), var(--accent-dark));
	box-shadow: 0 10px 18px rgba(203, 79, 37, 0.26);
}

.btn-secondary {
	color: #fff;
	background: linear-gradient(135deg, var(--accent), var(--accent-dark));
	box-shadow: 0 10px 18px rgba(203, 79, 37, 0.26);
}


.btn:hover{
	transform: translateY(-2px);
}

.footer-note{
	padding: 0 24px 24px;
	color: var(--ink-soft);
	font-size: 0.92rem;
}

@media (max-width: 760px){
	.wrap{
		width: calc(100% - 12px);
		margin: 6px auto;
		border-radius: 18px;
	}

	.hero{
		padding: 24px 16px 14px;
	}

	.cards{
		grid-template-columns: 1fr;
		padding: 0 16px 16px;
	}

	.footer-note{
		padding: 0 16px 16px;
	}
}

</style>
</head>

<body>

<main class="wrap">
	<section class="hero">
		<h1>Welcome to Dog Registration System!</h1>

	</section>

	<section class="cards">
		<article class="card">
			<h2>Register a Dog</h2>
			<p>Add a new dog with name, breed, age, address, color, height, and weight.</p>
			<div class="btns">
				<a class="btn btn-primary" href="DogRegister.php">Open Registration Form</a>
			</div>
		</article>

		<article class="card">
			<h2>View Dog Records</h2>
			<p>Check all existing entries in the records table.</p>
			<div class="btns">
				<a class="btn btn-secondary" href="DogView.php">Open Records Page</a>
			</div>
		</article>
	</section>

</main>

</body>
</html>
