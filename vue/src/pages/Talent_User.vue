<template>
    <div>
      <div style="padding-right: 90%;  background-color: #F8F8FF; padding-bottom: 150px;padding-top: 30px;">
      <h1 style="padding-left: 50px;font-weight: 500; font-size: 32px; color: #525252;">Profile</h1>
          <div class= "name-email">
              <h5 class="user-name">Sebastian Villanueva</h5>
              <p style="position: absolute; left: 170px;top: 50px;font-size: small;">@JonathanVillanueva</p>
              <img style="width: 158px; height: 158px; border-radius: 100%" src="https://pixy.org/src/477/4774988.jpg" alt="alternatetext">
              <div id= "par-pos">
                  <p style=" width: 800px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit aut suscipit eum minus, omnis adipisci dicta molestiae corrupti laudantium exercitationem mollitia ipsa illo cupiditate sunt accusamus maxime nostrum aliquid. Praesentium?</p>
              </div>
      
          </div>
      </div>
    </div>

    

  
</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Footer from '../components/Footer/Footer.vue';
export default{
  components: {
    Navbar,
    Footer
  },
}
</script>

<style>
</style>
