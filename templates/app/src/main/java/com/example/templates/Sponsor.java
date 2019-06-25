package com.example.templates;

public class Sponsor {

        private String title,pic,id;


        public Sponsor(String title,String pic,String id) {
            this.title = title;
            this.pic = pic;
            this.id = id;

        }

    public Sponsor() {

    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getPic() {
        return pic;
    }

    public void setPic(String pic) {
        this.pic = pic;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }


    }

