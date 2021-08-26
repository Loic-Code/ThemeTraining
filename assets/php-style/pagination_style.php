<style>
/* Customisable color */
/* For number */
.pagination li a.page-link{
    color: <?= $primary_color ?>;
}
/* For arrow */
.pagination li:first-child a.page-link{
    background: <?= $light_color ?>;
    color: <?= $primary_color; ?>;
}
.pagination li:last-child a.page-link{
    background: <?= $light_color ?>;
    color: <?= $primary_color; ?>;
}
/* for number on hover */
.pagination li.active a.page-link,
.pagination li a.page-link:hover,
.pagination li.active a.page-link:hover{
    color: <?= $primary_color ?>;
}
.pagination li a.page-link:before,
.pagination li a.page-link:after{
    background: <?= $light_color ?>;
}

/* For placement */
.pagination{
    display: inline-flex;
    overflow: hidden;
    position: relative;
}
.pagination li a.page-link{
    width: 45px;
    height: 45px;
    line-height: 45px;
    border-radius: 0;
    border: none;
    padding: 0;
    margin: 0 12px 0 0;
    background: transparent;
    font-size: 20px;
    font-weight: 600;
    transition: all 0.3s linear 0s;
}
.pagination li a.page-link.number{
border-radius: 50px;
}
.pagination li:first-child a.page-link{
    -webkit-clip-path: polygon(100% 0%, 75% 50%, 100% 100%, 25% 100%, 0% 50%, 25% 0%);
    clip-path: polygon(100% 0%, 75% 50%, 100% 100%, 25% 100%, 0% 50%, 25% 0%);
}
.pagination li:last-child a.page-link{
    margin-right: 0;
    -webkit-clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
    clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
}
.pagination li.active a.page-link,
.pagination li a.page-link:hover,
.pagination li.active a.page-link:hover{
    border: none;
    background: transparent;
}
.pagination li a.page-link:before,
.pagination li a.page-link:after{
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    z-index: -1;
    transform: scale(0.1);
    transform-origin: left top 0;
}
.pagination li a.page-link:after{
    top: auto;
    left: auto;
    bottom: 0;
    right: 0;
    transform-origin: right bottom 0;
}
.pagination li a.page-link:hover:before,
.pagination li a.page-link:hover:after,
.pagination li.active a.page-link:before,
.pagination li.active a.page-link:after{
    opacity: 1;
    transform: scale(1);
    transition: all 0.3s linear 0s;
}
@media only screen and (max-width: 480px){
    .pagination{ display: block; }
    .pagination li{
        display: inline-block;
        margin-bottom: 20px;
    }
}

</style>