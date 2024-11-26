using System;

namespace MyApplication
{
    class Program
    {
        static void Main(string[] args)
        {
            Dog Tommy = new Dog();
            Dog Jocko = new Dog();

            Console.WriteLine(Jocko.breed);
            Console.WriteLine(Tommy.breed);
        }
    }
}
