package com.example.templates;

public class Demande {

    String cont,id;

    public Demande(String cont,String id) {
        this.cont = cont;
        this.id = id;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getCont() {
        return cont;
    }

    public void setCont(String cont) {
        this.cont = cont;
    }
}
