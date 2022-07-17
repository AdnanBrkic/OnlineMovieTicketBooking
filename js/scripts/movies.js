function openPage(){

      $('a.swiper-slide').click(function() {
        var id = $(this).attr('id');
        localStorage.removeItem("article_id");
        window.localStorage.setItem('article_id', id);
        changeLocations();
      }); 

      function changeLocations(){
        window.location = "#news_post";
      }
    }        
            
var MovieService = {
  init: function(){
    MovieService.listCategory();
  },

  swiperShow: function() {
       var swiper = new Swiper(".swiper", {
        slidesPerView: 2,
        slidesPerGroup : 2,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
            // when window width is >= 480px
            1024: {
              slidesPerView: 4,
             slidesPerGroup : 4
            },

            1436: {
              slidesPerView: 5,
             slidesPerGroup : 5
            },

            1620: {
              slidesPerView: 6,
             slidesPerGroup : 6
            },
            2560: {
              slidesPerView: 8,
             slidesPerGroup : 8
            }

          }
      });
  },

  listCategory: function() {
      $.get("rest/category", function(data) {
          var html2 = "";
          for(let i = 0; i < data.length; i++){
              html2 += `
                <div class="movies-tab swiper">
                      <div class="list-name">
                        <h3>`+data[i].name+`</h3>
                      </div>
                      <div id="`+data[i].name+`" class="movie-list swiper-wrapper">
                      </div>
                </div>`
          }

          $("#movies-list-all").html(html2);
          MovieService.swiperShow();

          for(let i = 0; i < data.length; i++){
              var category_name = "";
              category_name += data[i].name;
              console.log(category_name);
              MovieService.list(category_name);
          }

      });
  },

  list: function(category_name){
    $.get("rest/movies", function(data) {
      var html = "";

      for(let i = 0; i < data.length; i++){
        //if(data[i].category != "action") break;
        if (data[i].category.toLowerCase().indexOf(category_name.toString()) < 0) continue;
        html += `  
          <a id="`+data[i].id+`" class="swiper-slide" onclick="openPage();" href="">
                <div class="movie-details">
                    <div class="details-content">
                        <p class="name">`+data[i].movie_name+`</p>
                        <p class="director">`+data[i].director+`</p>
                        <div class="more-details">
                            <div class="stars-rate">
                                <i class="fa-solid fa-star"></i>
                                <p class="movie-rate">`+data[i].rating+`</p>
                            </div>
                            <div class="year">
                                <p>2020</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="movie-thumb">
                    <img src="`+data[i].movie_image+`".jpg"">
                </div>
            </a>`
      }
      $('#' + category_name.toString()).html(html);
    });
  },
  listTransfers: function(){
    $.ajax({
        type: "get",
        url: "rest/transfers",
        success: function (data) {
          var html = "";
          for(let i = 0; i < data.length; i++){
            //console.log(ToDoService.get(data[i].sender_id)); why is it undefined
            html += `<tr>
                        <th>`+data[i].sender_id+` `+data[i].sender_id+`</th>
                        <th>`+data[i].recipient_id+` `+data[i].recipient_id+`</th>
                        <th>`+data[i].created_at+`</th>
                        <th>`+data[i].amount+`</th>
                      </tr>`;
          }
          let oldHtml = $("#transfer-table-list").html();
          $("#transfer-table-list").html(oldHtml+html);
        }
    });
  },
}
MovieService.init();