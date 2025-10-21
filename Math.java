//Math Functions
public class Math {
    /*
    Developer: Benjamin Lee
    University ID: 230134175
    Function: This function takes two inputs as integers, the first number as the base and the second as the coefficient.
        It then returns the base (num1) raised to by a power of the coefficient (num2).
    */
    public int Power(int num1, int num2) 
    {
        return Math.pow(num1,num2)
    }
    //modulo function (Benjamin Lee)
    public int mod(int num1, int num2)
    {
        return num1%num2;
    }
    // Multiply Function (kamalpreet singh)
    public int multiply (int number1, int number2)
     {
        return number1 * number2;

    }

    // Minimum of two values (Mihsan)
    public int min(int num1, int num2) {
        if (num1 < num2) {
            return num1;
        } else-if {
            return num2;
        }
    }

    //Add two Values (Ayomide)
    public int add(int num1, int num2){
    return num1 + num2;
    }

    //Subtract two Values (Rehan)
    public int Subtract(int num1, int num2) {
       return num1 - num2;
    }

}
