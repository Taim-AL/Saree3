import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';

class PageThree extends StatelessWidget {
  const PageThree({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(20),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              const SizedBox(
                height: 30,
              ),
              Center(
                child: SvgPicture.asset(
                  'assets/images/svgs/fast_delivery.svg',
                  width: 300,
                ),
              ),
              const SizedBox(
                height: 150,
              ),
              Text(
                "It's Never Too Late. \n",
                style: Theme.of(context).textTheme.headlineMedium,
              ),
              
              Text.rich(
                softWrap: true,
                textAlign: TextAlign.center,
                TextSpan(
                  text: "You don't have to wait. \n",
                  style: Theme.of(context).textTheme.bodyMedium,
                  children: [
                    TextSpan(
                      text: 'Your orders will be delivered to you ',
                      style: Theme.of(context).textTheme.bodyMedium,
                    ),
                    TextSpan(
                        text: 'in a blink of an eye.',
                        style: Theme.of(context).textTheme.labelMedium!.copyWith(fontSize: 18, color: Theme.of(context).colorScheme.primary, wordSpacing: -2),),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
