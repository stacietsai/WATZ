.help-bg {
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.75);
    position: fixed;
    align-items: center;
    justify-content: center;
    z-index: 30;
}


.mask {
    width: 760px;
    height: 530px;
    position: fixed;
    overflow: hidden;
    border-radius: 15px;
    position: relative;

}

.mask ul {
    width: 4560px;
    height: 530px;
    border-radius: 15px;
    position: absolute;
    transition: cubic-bezier(.89, -0.2, .2, 1.1) 1400ms;

}

.mask ul li {
    width: 760px;
    height: 530px;
    border: transparent;

}

.mask ul li .goNext {
    transition-delay: 1.5s;
    transition: ease-in-out 1s;
}

.cursor {
    cursor: pointer;
}


/* --------block1----------- */

.block1 {
    background-image: url("images/BG2.svg");
    background-size: cover;
    background-repeat: repeat-y;
    align-items: center;
    justify-content: center;
    position: relative;
    transition-delay: 50ms;
}

.box1-title {
    width: 380px;
    height: 500px;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
}

.box1-title h2 {
    height: 100px;
    text-align: center;
    color: #03588C;
    line-height: 50px;
}

.box1-title h4{
    display: none;
    text-align: center;
    color: #03588C;
}

.img-centerkv {
    width: 380px;
    justify-content: center;
}

.help-btn {
    width: 150px;
    height: 150px;
    background-color: #FF9685;
    border: white 5px solid;
    border-radius: 50%;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.5s;
    filter: drop-shadow(2px 2px 2px rgba(124, 124, 124, 0.637));
}

.help-btn:hover,
.block5-helpBtn:hover {
    background-color: #0388A6;
}

.help-btn img {
    width: 50px;
    height: 50px;
    filter: drop-shadow(5px 5px 0px rgba(70, 70, 70, 0.5));
}

.help-btn h3 {
    color: white;
    font-size: 27px;
    filter: drop-shadow(2px 2px 0px rgba(124, 124, 124, 0.637));
}

.float-img {
    width: 80px;
    position: absolute;
}

.animation {
    animation: 1s 0s infinite alternate;
    animation-timing-function: linear;
    filter: drop-shadow(0px 0px 5px rgba(70, 70, 70, 0.5));
}

.sock1,
.sock2 {
    right: 5%;
    top: 20%;
    transform: rotate(25deg);
    width: 100px;
    height: 100px;
    animation-name: sock1;
}

@keyframes sock1 {
    0% {
        top: 20%;
        transform: rotate(30deg);
    }

    100% {
        top: 23%;
    }
}

.sock2 {
    top: 28%;
    animation-name: sock2;
}

@keyframes sock2 {
    0% {
        top: 28%;
        transform: rotate(15deg);
    }

    100% {
        top: 30%;
    }
}

.sock3 {
    left: 8%;
    bottom: 2%;
    transform: rotate(20deg);
    width: 90px;
    animation-name: sock3;
}

.sock4 {
    left: 8%;
    bottom: 5%;
    transform: rotate(20deg);
    width: 90px;
    animation-name: sock4;

}

@keyframes sock3 {
    0% {
        bottom: 2%;
        transform: rotate(-10deg);
    }

    100% {
        bottom: 5%;
    }
}

@keyframes sock4 {
    0% {
        left: 15%;
        transform: rotate(30deg);
    }

    100% {
        left: 12%;
        bottom: 1%;
    }
}


.sock5 {
    left: 3%;
    top: 2%;
    transform: rotate(-20deg) scaleX(-1);
    width: 130px;
    animation-name: sock5;
}

@keyframes sock5 {
    0% {
        transform: rotate(-10deg)scaleX(-1);
    }
}


.sock6 {
    right: 8%;
    bottom: 10%;
    transform: rotate(30deg)scaleX(-1);
    animation-name: sock6;
}

@keyframes sock6 {
    0% {
        transform: rotate(10deg)scaleX(-1);
    }
}


.end {
    font-size: 80px;
    transform: rotate(45deg);
    font-weight: 900;
    margin: -75px 0 0 17px;
    position: absolute;
    right: 4%;
    top: 13%;
    color: #707070;
    border-radius: 10px;
}






/* ---------選單的全block設定-------------- */
.block2,
.block3,
.block4,
.block5 {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #F8F4EB;
}
.filter{
    -webkit-filter: grayscale(0.3);
    filter: grayscale(0.3);
};

.box-top {
    margin-bottom: 20px;
}

.bottom-left {
    width: 45px;
    height: 350px;
}

.bottom-right {
    width: 600px;
    height: 350px;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.BR-left,
.BR-right {
    width: 250px;
    height: 350px;
    flex-direction: row;
    justify-content: space-around;
}

.block-img {
    width: 95px;
    height: 200px;

}

.block-img>label>img {
    width: 100%;
    height: 100%;
    <!-- filter: drop-shadow(0px 0px 2px rgba(114, 114, 114, 0.5)); -->
    
}

.bottom-left img {
    width: 80%;
}

.goPrev {
    cursor: pointer;
}

/* ----------------radio-button 設定----------- */
.radio-group {
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}

.radio-input {
    visibility: hidden;
    /* 把原本的input藏起來 */
}

.radio-label {
    font-size: 1.6rem;
    cursor: pointer;
    position: relative;
    padding-left: 3.5rem;
}

.radio-button {
    height: 2rem;
    width: 2rem;
    border: 3px solid #FFB3A7;
    border-radius: 50%;
    background-color: #FFFFFF;
    display: inline-block;
    position: absolute;
    left: 0;
    top: 0;
}

.radio-button::after {
    content: "";
    display: block;
    height: 1rem;
    width: 1rem;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FFB3A7;
    opacity: 0;
    transition: opacity 0.2s;
}

.radio-input:checked~.radio-label .radio-button::after {
    opacity: 1;
}


/* -----------block2--------------- */
.block2-bottom-left {
    display: none;
}

/* ----------block5--------------- */


.bottom-result {
    width: 100px;
    height: 350px;
    align-items: center;
    justify-content: center;
}

.block5-helpBtn {
    width: 80px;
    height: 80px;
    background-color: #FFB3A7;
    border: white 5px solid;
    border-radius: 50%;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.block5-helpBtn img {
    width: 30px;
    height: 30px;
}

.block5-helpBtn h3 {
    color: white;
    font-size: 12px;
}

.block5-box-bottom {
    width: 700px;
    align-items: center;
    justify-content: space-around;
}

/* --------finish block6-------- */
.block6 {
    align-items: center;
    justify-content: center;
    background: transparent;
    background-color: transparent;
}

.block6-box {
    width: 250px;
    height: 300px;
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;
}

.block6-box>div {
    width: 150px;
    height: 150px;
    background: #FFB3A7;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    position: relative;
}

.block6-box>div>img {
    width: 70%;
    height:70%;
    filter: drop-shadow(5px 5px 0px rgba(70, 70, 70, 0.5));
    animation-name:block6;
    animation:2s block6 infinite;
    position: absolute;
    transition: 0.5s;

}
@keyframes block6 {
    0% {
        transform: rotate(-10deg);
    }50% {
        transform: rotate(20deg);
    }

    100% {
        transform: rotate(-10deg);
    }
}


.block6-box h5 {
    width: 200px;
    height: 30px;
    background: #0388A6;
    border-radius: 13px;
    color: white;
    align-items: center;
    justify-content: center;
}

/* -----------RWD 992px ------------- */
@media screen and (max-width:992px) {

    .mask {
    width: 80vw;
    height: 70vh;
}
.mask ul {
    width:480vw;
    height: 70vh;
    transition: cubic-bezier(.89, -0.2, .2, 1.1) 1800ms;
}
.mask ul li {
    width:80vw;
    height: 70vh;
}
/* ----------block1-------- */
.box1-title {
        width: 40vw;
        height: 65vh;
    }
    .box1-title h2 {
        font-size: 2rem;
        height: 15vh;
        text-align: center;
        line-height: 45px;
    }
    .img-centerkv {
        width: 40vw;
        height: 20vh;
    }
    .help-btn {
        width: 20vh;
        height: 20vh;
    }
    .help-btn img {
    width: 8vh;
    height:8vh;
    filter: drop-shadow(3px 3px 0px rgba(70, 70, 70, 0.5));
}
   
    .help-btn h3 {
    font-size: 1.2rem;
    filter: drop-shadow(0px 0px 0px rgba(124, 124, 124, 0.637));
}

.float-img {
     width: 20vh;
        height: 20vh;
    }

    .sock1,.sock2 {
        width: 8vh;
    height: 12vh;
    }

  

    @keyframes sock2 {
    0% {
        top: 28%;
        transform: rotate(15deg);
    }

    100% {
        top: 30%;
    }
}




@keyframes sock3 {
    0% {
        bottom: 2%;
        left: 1%;
        transform: rotate(-10deg);
    }

    100% {
        left: 2%;
        bottom: 5%;
    }
}
@keyframes sock4 {
    0% {
        left: 2%;
        transform: rotate(30deg);
    }

    100% {
        left: 3%;
        bottom: 1%;
    }
}
.sock6 {
    right: 2%;
}

@keyframes sock6 {
    0% {
        right: 1%;
    bottom: 10%;
        transform: rotate(15deg)scaleX(-1);
    }
}
   

    /* ----------/block1-------- */
    /* ----------all block-------- */
 li>div>h3 {
        font-size: 1.5rem;
        
    }
    .box-top {
    padding-bottom: 2vh;
}
.box-bottom{
    flex-direction: row;
    align-items: center;
    justify-content:center;
    height: 50vh;
}
.bottom-left {
    width: 6vw;
    height: 50vh;
}
.bottom-right {
    width:60vw;
    height: 50vh;
}
.BR-left,
.BR-right {
    width:30vw; 
    height: 40vh;
}
.block-img{
    width: 80px;
    height: 175px;
    filter: drop-shadow(0px 0px 0px rgba(124, 124, 124, 0.637));
}
.radio-group{
    justify-content: space-evenly;
}

  .radio-group  h5{
        font-size: 1rem;
        text-align:center;

    }

    .block3-group{
        justify-content: space-evenly;
    }
    .radio-group .block3-text{
        /* height: 10vh; */
        width: 10vw;
        font-size: 1rem;
        text-align:center;
        line-height:2vh;
      
    }

    /* -------- */
    .block5-box-bottom {
    width:70vw;
    justify-content:space-evenly;
}
.bottom-result {
    width:9vw;
    height:9vw;
    margin-left: 2vw;
}
.block5-helpBtn {
    width:8vw;
    height:8vw;
    border: white 3px solid;
    border-radius: 50%;
}
.block5-helpBtn img {
    width: 5vw;
    height: 5vw;
}
.block5-helpBtn h3 {
     display: none;
}
.block5-bottom-right>.BR-left,
.block5-bottom-right>.BR-right {
    width:28vw; 
    height: 40vw;
}
}

@media screen and (max-width:610px) {
    .box1-title h2 {
        font-size: 1.5rem;
        line-height: 30px;
    }
    .block5-pic{
        width: 60px;
    height: 130px;

    }
}


@media screen and (max-width:576px) {
    .mask {
    width: 75vw;
    height: 75vh;
}
.mask ul {
    width:450vw;
    height: 75vh;
    <!-- transition: cubic-bezier(.69, -0.1, .1, 1.1) 2300ms; -->
    transition:cubic-bezier(0,0,1,1) 2000ms;;
    
}
.mask ul li {
    width:80vw;
    height: 75vh;
}

.mask ul li .goNext {
    transition-delay: 2.5s;
    transition: ease-out 2s;
}

/* ----------block1-------- */
.box1-title h2 {
    display: none;
    }

    .box1-title h4{
        display: inline;
        font-size: 1.5rem;
        line-height: 30px;
}
    .img-centerkv {
        width: 35vw;
        height: 15vh;
    }
    .help-btn {
        width: 15vh;
        height: 15vh;
    }
    .help-btn img {
    width: 6vh;
    height:6vh;
}
.help-btn h3 {
    font-size: 1rem;
}
.float-img {
    width: 10vh;
    height: 10vh;
    }
    .sock1,.sock2 {
        width: 7vh;
    height: 11vh;
    right: 3%;
    top: 15%;
    }

.sock5 {
    top: 18%;
}
.box-top{
    width: 50vw;
    margin-top:10px;
    padding-bottom: 0vh;
}
.box-top>h3{
    font-size: 1.2em;
    text-align: center;
}
.box-bottom{
    height: 60vh;
    flex-direction:column-reverse;
    justify-content: space-evenly;
    align-items: flex-start;
}
.bottom-left{
    width: 7vh;
    height: 7vh;
}

.bottom-right {
    flex-direction:column;
    justify-content: space-evenly;
}
.BR-left,.BR-right{
    width: 35vh;
    height: 20vh;
}

.radio-label, .radio-button {
  display: none;
}
.block-img{
    width: 60px;
    height: 130px;
}
.radio-group .block3-text{ 
       width: 25vw;
       font-size: 0.8rem;
       text-align:center;
       line-height:2vh;

   }

   .block5{
    position:relative;
   }
   .block5-box-bottom {
    width:30vh; 
    height:60vh; 
    flex-direction: column-reverse;
    justify-content:space-evenly;
    align-items: center;
    position:relative;
}

.block5-box-bottom > .bottom-left{
    margin-right: 20vh;
    width: 7vh;
    height: 7vh;
}
 .block5-bottom-right{
    flex-direction: column;
   
    
}
.block5-bottom-right>.BR-left,
.block5-bottom-right>.BR-right {
    width:27vh; 
    height: 25vh;
} 
.bottom-result {
    position: absolute;
    width:9vh;
    height:9vh;
    right:0%;
    bottom:0%;   
}

.block5-helpBtn {
    width:9vh;
    height:9vh;
    border: white 5px solid;
}
.block5-helpBtn img {
    width: 5vh;
    height:5vh;
}
}