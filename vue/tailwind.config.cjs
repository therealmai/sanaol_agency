
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#7367F0",
        secondary: "#525252",
        lightgray: "#D9D9D9",
        lightpurple: "#F6F5FF",
        background2: "#F8F8FF",
        outline_border: "#525252",
        primaryHovered: "#7367F0",
        divider: "#E7E7E7",
        
        detailText: "#989898",
        inputOutline: "#A8A8A8",
        textInput:"#A8A8A8",
    },
    fontSize: {
        textButtons:"1.5rem",
        textModal: "1.25rem",
        textInput: "1.25rem",
    },
    fontFamily: {
        inter: ['"Inter"'],
        
    },
    },
  },
  plugins: []
  
}
