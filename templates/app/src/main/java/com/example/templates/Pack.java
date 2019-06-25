package com.example.templates;

public class Pack {
    private String idPack,nomPack ,descriptionPack,typePack,montant,audience,deadline;

    public Pack(String idPack, String nomPack, String descriptionPack, String typePack, String montant, String audience, String deadline) {
        this.idPack = idPack;
        this.nomPack = nomPack;
        this.descriptionPack = descriptionPack;
        this.typePack = typePack;
        this.montant = montant;
        this.audience = audience;
        this.deadline = deadline;
    }

    public String getIdPack() {
        return idPack;
    }

    public void setIdPack(String idPack) {
        this.idPack = idPack;
    }

    public String getNomPack() {
        return nomPack;
    }

    public void setNomPack(String nomPack) {
        this.nomPack = nomPack;
    }

    public String getDescriptionPack() {
        return descriptionPack;
    }

    public void setDescriptionPack(String descriptionPack) {
        this.descriptionPack = descriptionPack;
    }

    public String getTypePack() {
        return typePack;
    }

    public void setTypePack(String typePack) {
        this.typePack = typePack;
    }

    public String getMontant() {
        return montant;
    }

    public void setMontant(String montant) {
        this.montant = montant;
    }

    public String getAudience() {
        return audience;
    }

    public void setAudience(String audience) {
        this.audience = audience;
    }

    public String getDeadline() {
        return deadline;
    }

    public void setDeadline(String deadline) {
        this.deadline = deadline;
    }
}
