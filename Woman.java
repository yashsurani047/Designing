class Boy {
    private String name;
    private double salary;
    private double propertyValue;

    public Boy(String name, double salary, double propertyValue) {
        this.name = name;
        this.salary = salary;
        this.propertyValue = propertyValue;
    }

    public double getTotalWealth() {
        return salary + propertyValue;
    }

    public String getName() {
        return name;
    }
}

class Girl {
    private String name;

    public Girl(String name) {
        this.name = name;
    }

    public void greet(Boy boy) {
        System.out.println(this.name + " says hi to " + boy.getName());
        if (boy.getTotalWealth() > 50000) { // threshold for "rich"
            impress(boy);
        } else {
            ignore(boy);
        }
    }

    private void impress(Boy boy) {
        System.out.println(this.name + " tries to impress " + boy.getName() + " positively.");
    }

    private void ignore(Boy boy) {
        System.out.println(this.name + " ignores " + boy.getName() + ".");
    }
}

public class Main {
    public static void main(String[] args) {
        Boy richBoy = new Boy("John", 60000, 20000);
        Boy poorBoy = new Boy("Mike", 20000, 10000);
        
        Girl girl = new Girl("Alice");

        girl.greet(richBoy);
        girl.greet(poorBoy);
    }
}


so i want java code of this if Men or boy comes to girls and say hi then he check his property and salary and its rich then she try to impress him by responding positive otherwise he was poor then try to ignore him 