package com.example.templates;


/**
 * Created by Belal on 10/18/2017.
 */


public class Event {
    private String idEvent,idOrg,nomEvent,heureEvent,lieuEvent,descriptionEvent,URL_Image,categorie,type,datedeb,datefin,lienfb,descOrg,siteOrg,bud;


    public Event(String idEvent,String idOrg, String nomEvent,String datedeb,String datefin, String heureEvent, String lieuEvent, String descriptionEvent,String URL_Image,String categorie,String type,String lienfb,String descOrg,String siteOrg,String bud) {
        this.idEvent = idEvent;
        this.nomEvent = nomEvent;
        this.heureEvent = heureEvent;
        this.lieuEvent = lieuEvent;
        this.descriptionEvent = descriptionEvent;
        this.URL_Image = URL_Image;
        this.categorie = categorie;
        this.type = type ;
        this.datedeb = datedeb;
        this.datefin = datefin ;
        this.descOrg = descOrg;
        this.siteOrg = siteOrg;
        this.lienfb = lienfb;
        this.bud = bud;
        this.idOrg = idOrg;

    }

    public String getIdOrg() {
        return idOrg;
    }

    public void setIdOrg(String idOrg) {
        this.idOrg = idOrg;
    }

    public String getBud() {
        return bud;
    }

    public void setBud(String bud) {
        this.bud = bud;
    }

    public String getCategorie() {
        return categorie;
    }

    public void setCategorie(String categorie) {
        this.categorie = categorie;
    }

    public String getIdEvent() {
        return idEvent;
    }

    public String getLienfb() {
        return lienfb;
    }

    public void setLienfb(String lienfb) {
        this.lienfb = lienfb;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getDatedeb() {
        return datedeb;
    }

    public void setDatedeb(String datedeb) {
        this.datedeb = datedeb;
    }

    public String getDatefin() {
        return datefin;
    }

    public void setDatefin(String datefin) {
        this.datefin = datefin;
    }

    public String getDescOrg() {
        return descOrg;
    }

    public void setDescOrg(String descOrg) {
        this.descOrg = descOrg;
    }

    public String getSiteOrg() {
        return siteOrg;
    }

    public void setSiteOrg(String siteOrg) {
        this.siteOrg = siteOrg;
    }

    public String getNomEvent() {
        return nomEvent;
    }

    public String getHeureEvent() {
        return heureEvent;
    }

    public String getLieuEvent() {
        return lieuEvent;
    }

    public String getDescriptionEvent() {
        return descriptionEvent;
    }

    public String getURL_image() {
        return URL_Image;
    }

    public void setIdEvent(String idEvent) {
        this.idEvent = idEvent;
    }

    public void setNomEvent(String nomEvent) {
        this.nomEvent = nomEvent;
    }

    public void setHeureEvent(String heureEvent) {
        this.heureEvent = heureEvent;
    }

    public void setLieuEvent(String lieuEvent) {
        this.lieuEvent = lieuEvent;
    }

    public void setDescriptionEvent(String descriptionEvent) {
        this.descriptionEvent = descriptionEvent;
    }

    public void setURL_Image(String URL_Image) {
        this.URL_Image = URL_Image;
    }
}
