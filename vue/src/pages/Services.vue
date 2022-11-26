<template>
    <!-- MAIN SERVICE PAGE -->
  <div class="pt-[96px] px-[237.5px] mb-[25px] text-[#525252]">
    <!-- TITLE -->
    <h1 class="text-center text-2xl font-bold">Our Services</h1>

    <!-- INDIVIDUAL SERVICES -->
    <!-- USE LOOP WHEN FETCHING FROM DATABASE -->
    <Service id="1" title="Recreational Acitvity" 
              content="A successful competition for me is always going out there and putting 100 percent into whatever I'm doing. 
                      It's not always winning. People, I think, mistake that it's just winning. 
                      Sometimes it could be, but for me, it's hitting the best sets I can, gaining confidence, and having a good time and having fun.
                      What people don't understand is joining a gang ain't bad, it's cool, it's fine. 
                      When you in the hood, joining a gang it's cool because all your friends are in the gang, all your family's in the gang. 
                      We're not just killing people every night, we're just hanging out, having a good time."
              image="https://i0.wp.com/www.traveling-up.com/wp-content/uploads/2019/04/COVER-mainstream-beers-in-the-philippines-san-miguel-vintage-bottles.jpg?fit=1200%2C675&ssl=1">
    </Service>

    <Service id="2" title="Demolition" 
              content="We clawed, we chained, our hearts in vain.
                      We jumped, never asking why.
                      We kissed, I fell under your spell.
                      A love no one could deny.
                      Don't you ever say I just walked away.
                      I will always want you.
                      I can't live a lie, running for my life.
                      I will always want you.
                      I came in like a wrecking ball.
                      I never hit so hard in love.
                      All I wanted was to break your walls.
                      All you ever did was wreck me.
                      Yeah, you, you wreck me.
                      I put you high up in the sky
                      And now, you're not coming down.
                      It slowly turned, you let me burn.
                      And now, we're ashes on the ground.
                      Don't you ever say I just walked away.
                      I will always want you.
                      I can't live a lie, running for my life.
                      I will always want you."
              image="https://i.ytimg.com/vi/VP8KjbXuP8Y/maxresdefault.jpg">
    </Service>

    <Service id="3" title="Lawnmowing" 
              content="I walked through the door with you.
                      The air was cold.
                      But something about it felt like home somehow.
                      And I, left my scarf there at your sister's house.
                      And you've still got it in your drawer even now.
                      Oh, your sweet disposition.
                      And my wide-eyed gaze.
                      We're singing in the car, getting lost upstate.
                      Autumn leaves falling down like pieces into place
                      And I can picture it after all these days
                      And I know it's long gone and that magic's not here no more
                      And I might be okay but I'm not fine at all
                      'Cause there we are again on that little town street
                      You almost ran the red 'cause you were lookin' over at me
                      Wind in my hair, I was there
                      I remember it all too well
                      Photo album on the counter
                      Your cheeks were turning red
                      You used to be a little kid with glasses in a twin-sized bed
                      And your mother's telling stories 'bout you on the tee-ball team
                      You told me 'bout your past thinking your future was me"
              image="https://s7d2.scene7.com/is/image/TWCNews/taste_of_fall_blogpngpng">
    </Service>

  </div>
</template>
  
  
<script>
  import Service from '../components/Cards/Service/Service.vue';

  export default{
    components: {
      Service,
    },
  }
</script>
  
<style>
</style>