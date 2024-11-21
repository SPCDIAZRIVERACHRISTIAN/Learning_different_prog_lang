using System;

public class Variables
{
    public static void Main(string[] args)
    {
        string name = "wilmarian";
        const int age = 30;
        // age = 28;
        double myDoubleNum = 5.99D;
        bool isIT = true;
        char Letter = 'X';

        Console.WriteLine("Hello " + name);
        Console.WriteLine(age + Letter);
        Console.WriteLine(myDoubleNum);
        Console.WriteLine(isIT);
        // Console.WriteLine(Letter);
    }
}
