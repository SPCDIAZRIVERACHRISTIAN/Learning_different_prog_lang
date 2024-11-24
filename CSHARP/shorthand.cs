using System;

namespace MyApplication
{
    class Program
    {
        static void Main(string[] args)
        {
            int balance = 200;
            Console.Write("Do you want to buy this potion? ");
            string answer = Console.ReadLine();
            if (answer == "yes")
            {
                int newBalance = balance - 20;
                string result = (balance > 20) ? "purchased succesfully" : "Failed to Buy";
                Console.WriteLine("Your new balance is: " + newBalance);
            }
            else if(answer == "no")
            {
                Console.WriteLine("If you are not going to buy nothing get out!");
            }
            else
            {
                Console.WriteLine("What did you say!?");
            }
        }
    }
}
