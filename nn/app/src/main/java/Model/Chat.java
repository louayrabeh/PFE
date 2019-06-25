package Model;

public class Chat {
    private String sender;
    private String receiver;
    private String message;
    private String type;
    private String sent;
    private boolean seen;
    public Chat(String sender,String receiver, String message,String type, String sent,boolean seen){
        this.sender=sender;
        this.receiver=receiver;
        this.message=message;
        this.type=type;
        this.seen=seen;
        this.sent=sent;
    }
    public Chat(){}

    public String getSender() {
        return sender;
    }

    public void setSender(String sender) {
        this.sender = sender;
    }

    public String getReceiver() {
        return receiver;
    }

    public void setReceiver(String receiver) {
        this.receiver = receiver;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public boolean isSeen() {
        return seen;
    }

    public void setSeen(boolean seen) {
        this.seen = seen;
    }

    public String getSent() {
        return sent;
    }

    public void setSent(String sent) {
        this.sent = sent;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }
}
