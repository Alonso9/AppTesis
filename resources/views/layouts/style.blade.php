body{
	margin: 70px 200px 50px 200px; /*Top, right, botton and left*/
	border: 1px solid gray;
	border-style: dashed;
}

.wrapper {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 10px;
  grid-auto-rows: minmax(100px, auto);
}
.one {
  grid-column: 1 / 3;
  grid-row: 1;
/*  background-color: blue;*/
}
.two {
  grid-column: 1 / 5;
  grid-row: 1 / 3;
/*  background-color: gray;*/
}
.three {
  grid-column: 1 / 3;
  grid-row: 2 / 5;
/*  background-color: gray;*/
/*  background-image: url(fondo2.jpg);*/
}
.four {
  grid-column: 1 / 5;
  grid-row: 3;
/*  background-color: gray;*/
}
.five {
  grid-column: 1 / 3;
  grid-row: 4;
/*  background-color: blue;*/
}
.six {
  grid-column: 4;
  grid-row: 4;
/*  background-color: gray;*/
  text-align: center;
}

.seven{
	grid-column: 3 / 5;
  	grid-row: 1;
/*  	background-color: gray;*/
}

.logo{
	margin-top: 10px;
	margin-left: 20px;
	width: 16%;
	height: 80%;
}

.logoescuela{
	margin-top: 10px;
	margin-right: 20px;
	margin-left: 425px;
	width: 16%;
	height: 80%;	
}

.titulo{
	text-align: center;
}

.line{
  border-top: 1px solid black;
  height: 2px;
  padding: 0;
  margin: 45px 25px 0 auto;

}

.date{
	margin-left: 70px;
}

.firma{
	margin-right: 30px;
}

.ubi{
	z-index: 100;
}

.fondo2{
	width: 100%;
	height: 100%;
	position: relative;
	z-index: -1;
	opacity: .35;
}

.indi{
	margin-left: 150px;
}
