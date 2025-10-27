//New Math functions, move old functions in a branch and merge.

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

}